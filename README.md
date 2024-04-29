
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<h1 class="Title" align="center"> BlogPHP </h1>

## Index

*[Title](#title)

*[Index](#index)

*[Project Description](#project-description)

*[Project Status](#project-status)

*[App characteristics and demo](#App-characteristics-and-demo)



## Project Description

<p dir="auto">BlogPHP is a blogger web page, created using different PHP, XAMPP and different libraries and frameworks, such as: </p>
     <ol>
        <li><a href="https://laravel.com/docs/11.x" target="_blank">Laravel</a></li>
        <li><a href="https://jetstream.laravel.com/introduction.html" target="_blank">Jetstream</a></li>
        <li><a href="https://www.phpmyadmin.net/" target="_blank">PHPMyAdmin</a></li>
        <li><a href="https://vitejs.dev/" target="_blank">Vite</a></li>
        <li><a href="https://tailwindcss.com/" target="_blank">Tailwind CSS</a></li>
        <li><a href="https://alpinejs.dev/" target="_blank">Alpine.js</a></li>
        <li><a href="https://laravel-livewire.com/" target="_blank">Livewire</a></li>
        <li><a href="https://laravel.com" target="_blank">AdminLTE</a></li>
        <li><a href="https://ckeditor.com/" target="_blank">CKEditor</a></li>
        <li><a href="https://spatie.be/docs/laravel-permission/v6/introduction" target="_blank">Laravel Permission</a></li>
     </ol>


## Project Status

<h4 align="center">
:construction: Finished project, but more features can be added or improved :construction:
</h4>



## :hammer:App characteristics and demo

- `Jetstream User Authentication`: Users can login or register in the web page; users that are not authenticated can see the blog's main page but can't access the Admin Panel.
  

![autenticacion jetstream](https://github.com/nicolecarda/BlogPHP/assets/72530134/ee625c44-11eb-4dd8-9ba6-4112b3682560)

  
- `Blog Main Page`: In the main page of the blog, users can see diferent posts, with their image, tags and Category. There's also a menu that can be displayed on the right top of the page, for logging out or accesing the profile web page. Another menu is shown at the left top of the page with the post's tags, and another button that leads the user to the Admin Panel.
  

![blog home](https://github.com/nicolecarda/BlogPHP/assets/72530134/b5428749-7753-4613-8f05-d2edd04c81bc)


- `Profile View`: In this page the user can modify some personal information, such as their name, email, password, delete their account, choose a two factor authentification, or manage and log out their active sessions on other browsers and devices.


https://github.com/nicolecarda/BlogPHP/assets/72530134/34ed785a-ee9c-4444-a629-2581abf30dd3


- `Admin Panel`: When the users click on the Admin Panel option, it's redirected to the post's list view, where they can see, create, update and delete posts. Also the Admin Panel is displayed. On the Admin Panel there are different buttons for being redirected to the main page, showing the users list, the roles list, the categories and tags lists, the posts list, and creating new posts.

- `Users List`: In the users list view, users that have the permission can see all the user's IDs, names and emails that have been stored in the database. They can also choose to edit one user and change their name and assign them a role (admin, blogger or both).

- `Roles List`: If users choose the roles list option, they will be redirected to the roles list, where they can create new roles, update the existing ones, or delete them.

-  `Categories List`: In this view users can see the categories list, create a new category, update it or delete it.
  
-  `Tags List`:  In this view users can see the categories list, create a new category, update it or delete it.

-  `Create New Post`: In this view, users can create a new post. They can write its name, and the slug of the post will be authomatically created. Then they can choose the post category, and its tags from the existing ones. They can also upload a picture and if they don't choose one, a default picture will be used for the post. Then they can write the post extract and body.
  


