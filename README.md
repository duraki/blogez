## blogez
**blogez** (*blog*-**es**) is a stupid simple PHP powered blog site generator built on top of jekyll theme with a bit of customisation. It is currently running my blog located [here](http://dn5.ljuska.org). It was two, three hours of work and should not be used as a replacement for jekyll.  
  
## but why?
Because I wanted to, thats why. But seriously, **jekyll** with all due respect and how much I've used it, is a bit heavy for me. Jekyll heavy? Are you out of your mind? This pure script is solo PHP called over arguments. The second reason why I wrote this because I had a spare few hours for fun, so why not.  
  
## how to use it?
Pretty simple actually. Lets say you already got your **jekyll** blog. You probably want first to backup your already generated files. Next thing of course, create a blog.      
  
    % php blogez.php create myblog
    
Now you can either **cd** into *myblog* and create a new file or copy your old ones.  
  
    % cd blog/myblog
    % touch mypost.md
    
Awesome. Fill your mypost.md with actual data post in markdown and lets compile the project.  
  
    % php blogez.php compile myblog mypost.md "Title"  
    
    Cool! blogez just compiled your my-post.md with a title My post
    You may access the post manually. Your link for accessing is my-post.html
    ~ !
    To add your post on homepage, add this to your index.html site:
    ...

As you can see, the **first** argument is blog project you've created eariler.  
The **second** arugment is a post file which is in this case *mypost.md*.  
The **third** argument is the title of the post, set it acording to your post.  
  
Now add the output information from compiled process into *index.html*.  
  
## requirements  
* PHP 5.x>
* thats all!  

## demo
Demo of the blog generated by **blogez** is located on my official blog [here](http://dn5.ljuska.org). Don't you like it? :)  
  
## author
This was a 2 hours job as I already told you. It's been solo developed by [@dn5__](https://twitter.com/dn5__). You may want to make pull requests on official github dn5@blogez. Don't forget to star the project, you never know what the future brings.  
