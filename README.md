# Refiner v1.0.6
A simple Minimalistic web Framework built on top of mvc. You can use Refiner on any web project (small and large projects) you want.

## Refiner Features
-> Minimalistic : Refiner web framework is not large just a few MBs.
-> Efficient and fast : Refiner runs smoothly ,efficently and prety fast . The code is precise and clean.
-> Easy to Learn : It will take you a small amount of time to get a hang on it. Its much simpler for persons with knowlege on MVC
-> Secure : Be guranteed that your database interactions are not been intefered with

## FrameWork Structure
      
      + Application - +base
                      +bundle
                      +controller
                      +model
                      +view
                      
      +home ----------+ (here is where you include all project assets e.g javascript files, css, images, fonts etc)
## Tools
  -> Refiner Webframework is bundled with heplful tool to help you boot your productivity and get the best out of this framework. One of the common tools you'll often use is the RefinerQueryBuilder. This bundle will help you build queries in an intutive and more intresting way and executing. The QueryBuilder sanitizes queries and prevents sql injections. You can bullet proof more by using the Security class for XXSFiltering 
  ->SessionHandler. This inteface will help the programmer handel sessions and session data in an easy way 
  ->Auth . The auth bundle is a prebuilt Authenticaton system (login and registration) with enough security. Refiner uses custom login boostrap forms. we have created a number of these forms to give you the privillage of making a choice on which form you love.
    Note that => you must point the system to users table in the database ....important fields in your user table must include; user_name , user_password, user_email & session_id. 
    Also not that the forms bundle are not included in this project and come as a dependency.
    Prebuilt paypall intergration Module
    
   explore more to find out more
   
 ## Instalation 
  ->download from github to your maching
  and point composer to the composer.json file of this project.
  ->Run composer install 
  
  -> If Installed correctly you should see the refiner homepage with the word " Ola! Refiner ." 
  
  ## Notes on MVC
    MVC is an accronym denoting Model- view - Controller which discribes a pattern for structuring and building application.
    for more info on MVC read https://en.wikipedia.org/wiki/Model–view–controller
    
    ### The thinking behind Refiner
        1. Models : This is the business logic of your application and frequently provides updates to the views. This as data intesive structure and most of your database interactions should be coded in modelw
        2.Controller : The user uses the contoller to manupulate the model 
        3.Views : Top Most abstraction Layer. View provides a link between the user and the system. Its the point that provides a platform for a user to manipulate the system.
       
    ## Complete documentation
    
    For complete documentation on Refiner Web Framework read http:// refiner.phpinfusion.net
    @queries Email : refiner@phpinfusion.net
     
    
  
  
