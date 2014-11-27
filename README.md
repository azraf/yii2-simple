yii2-simple
==============

A yii2 basic package comes with pre-installed jquery UI, RBAC (mdmsoft/yii2-admin), User profile (dektrium/yii2-user), upload files plugin (mdmsoft/yii2-upload-file) and few more coming to boostup initial development time. 


DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources


REQUIREMENTS
------------

The minimum requirement by this application template that your Web server supports PHP 5.4.0.


INSTALLATION AND DOCUMENTATION
------------------------------

Please check http://blog.makewebsmart.com/yii2-simpleapp-with-yii2-admin-user-adminlte-and-few-more/234 for documentation.


IMPORTANT :
-----------

After installation complete, please:

1.  Uncomment the line `'admin/*'` of `config/web.php` : 
        
    'as access' => [
          'class' => 'mdm\admin\components\AccessControl',
          'allowActions' => [
      //    'admin/*',  // ::: IMPORTANT :::: Make it disable after configuring the USER Roles/Permissions

2.  Then browse to `http://[YOUR-APPLICATION-PATH]/admin/` in your browser

3.  Configure Yii2-admin as your need, set Permission/Roles and assign them to User

4.  After configuration complete, comment out the line again in your configuration

//    'admin/*',  // ::: IMPORTANT :::: Make it disable after configuring the USER Roles/Permissions


Now you all set!
