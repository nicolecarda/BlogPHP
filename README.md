<p align="center"><img src="https://github.com/nicolecarda/BlogPHP/assets/72530134/43548a1d-27f3-49a8-bd66-e64ba627bdbd" alt="Heart Icon" width="150px" alt=""></a></p>
<h1 class="Title" align="center"> BlogPHP </h1>


## Index

*Title

*Index

*Project Description

*Project Status

*App characteristics and demo



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

![post view](https://github.com/nicolecarda/BlogPHP/assets/72530134/11ec3de5-1391-4ef3-b695-ddf4f84e8dee)

![category view](https://github.com/nicolecarda/BlogPHP/assets/72530134/37e12489-db2e-4204-b5d5-b81ea7e7d799)

![tag view](https://github.com/nicolecarda/BlogPHP/assets/72530134/43efae98-b752-4987-8b6c-42fe310e560b)



- `Profile View`: In this page the user can modify some personal information, such as their name, email, password, delete their account, choose a two factor authentification, or manage and log out their active sessions on other browsers and devices.


https://github.com/nicolecarda/BlogPHP/assets/72530134/34ed785a-ee9c-4444-a629-2581abf30dd3


- `Admin Panel`: When the users click on the Admin Panel option, it's redirected to the post's list view, where they can see, create, update and delete posts. Also the Admin Panel is displayed. On the Admin Panel there are different buttons for being redirected to the main page, showing the users list, the roles list, the categories and tags lists, the posts list, and creating new posts.

  ![posts list](https://github.com/nicolecarda/BlogPHP/assets/72530134/cd52f14a-9877-4fb2-b260-20462097f6a7)

  ![update posts](https://github.com/nicolecarda/BlogPHP/assets/72530134/70f0bd5b-96f6-4b74-8523-2a38e90058ce)


- `Users List`: In the users list view, users that have the permission can see all the user's IDs, names and emails that have been stored in the database. They can also choose to edit one user and change their name and assign them a role (admin, blogger or both).

  ![users list](https://github.com/nicolecarda/BlogPHP/assets/72530134/233f731c-8449-464c-bf64-c6693a095eaf)

  
  ![user edit](https://github.com/nicolecarda/BlogPHP/assets/72530134/5fffbc09-abd2-472e-9933-74bfa734aaf3)


- `Roles List`: If users choose the roles list option, they will be redirected to the roles list, where they can create new roles, update the existing ones, or delete them.

  ![roles list](https://github.com/nicolecarda/BlogPHP/assets/72530134/6196c1f1-6f96-4888-8115-99f92d3108b4)


  ![roles update](https://github.com/nicolecarda/BlogPHP/assets/72530134/01122c74-08a9-406a-8325-d62e3b11f5ab)
  

-  `Categories List`: In this view users can see the categories list, create a new category, update it or delete it.

  ![categories list](https://github.com/nicolecarda/BlogPHP/assets/72530134/e3cb2144-6407-48bd-9e0d-a1c72d37a930)

  
-  `Tags List`:  In this view users can see the categories list, create a new category, update it or delete it.

  ![tags list](https://github.com/nicolecarda/BlogPHP/assets/72530134/f09c1f11-e841-4274-acf3-2ccf45b6f137)


-  `Create New Post`: In this view, users can create a new post. They can write its name, and the slug of the post will be authomatically created. Then they can choose the post category, and its tags from the existing ones. They can also upload a picture and if they don't choose one, a default picture will be used for the post. Then they can write the post extract and body.
  
  ![create posts](https://github.com/nicolecarda/BlogPHP/assets/72530134/72a2c626-6bd5-4778-90ff-755c804c708b)


