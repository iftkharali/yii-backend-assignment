<?php 
class BlogPostController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',  // allow verified users to perform CRUD operations
                'actions' => array('index', 'view', 'create', 'update', 'delete','like'),
                'users' => array('@'),
                'expression' => 'Yii::app()->user->isVerified()',
            ),
            array('allow',  // allow all users to view the index and view actions
                'actions' => array('index', 'view'),
                'users' => array('@'),
            ),
            array('deny',  // deny all users for any other actions
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex()
    {
        $model = new BlogPost('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['BlogPost']))
            $model->attributes = $_GET['BlogPost'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCreate()
    {
        $model = new BlogPost;

        if (isset($_POST['BlogPost'])) {
            $model->attributes = $_POST['BlogPost'];
            $model->user_id = Yii::app()->user->id; // Assign current user ID to the blog post

            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('_form', array(
            'model' => $model,
        ));
    }

    public function actionEdit($id)
    {
        $model = $this->loadModel($id); // Assuming you have a method to load the model by ID

        if (isset($_POST['BlogPost'])) {
            $model->attributes = $_POST['BlogPost'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Blog post updated successfully.');
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('edit', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        // Check if the current user owns the blog post
        if (!$this->checkOwnership($model)) {
            throw new CHttpException(403, 'You are not authorized to perform this action.');
        }

        if (isset($_POST['BlogPost'])) {
            $model->attributes = $_POST['BlogPost'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id)
    {
        $model = $this->loadModel($id);

        // Check if the current user owns the blog post
        if (!$this->checkOwnership($model)) {
            throw new CHttpException(403, 'You are not authorized to perform this action.');
        }

        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function loadModel($id)
    {
        $model = BlogPost::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    private function checkOwnership($model)
    {
        return Yii::app()->user->id == $model->user_id;
    }


    public function actionLike($id)
    {
        $userId = Yii::app()->user->id;
        $postId = (int) $id;

        // Check if the user already liked the post
        $like = Like::model()->findByAttributes(array(
            'user_id' => $userId,
            'blog_post_id' => $postId,
        ));

        if ($like) {
            // Unlike the post
            $like->delete();
            $action = 'unliked';
        } else {
            // Like the post
            $like = new Like();
            $like->user_id = $userId;
            $like->blog_post_id = $postId;
            $like->save();
            $action = 'liked';
        }

        // Count the total likes for the post
        $likeCount = Like::model()->countByAttributes(array(
            'blog_post_id' => $postId,
        ));

        // Return the response in JSON format
        echo CJSON::encode(array(
            'action' => $action,
            'likeCount' => $likeCount,
        ));
        
        Yii::app()->end();
    }
    
}
