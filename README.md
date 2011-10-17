# d0p_blog


## Introduction

As of 6:47am 10/16/2011, I've been working at this several hours a day for 
about ten days. I had several goals in mind in doing this. I want to build
a platform for my own personal use, and I want to do so using good 
practices along the way; Not get frustrated and go back into old habits. 

As such, I've re-done most parts three times over, and I'll continue to do
so, even after I'm "finished." My typical philosophy is "If it works, then
nothing else matters." I still stand by that, to some extent, but that
just doesn't fly for every situation.

--------------------------------------------------------------------------

## Documentation

### URL Structure

    path/index.php/controller/parameters**[**key/value**]**/
	
I'll do away with the index.php once it's in an environment where it's 
being used. I won't bother explaining my reasoning, but there *is* a 
method to the madness. It isn't like removing index.php from a URL is a
major task.

### Code Structure

This is one of those things that is going to be rewritten and refactored.
Of course, it's standard CodeIgniter-loose-MVC-PAC-WTFEver, but I do have
a tendency to put the wrong code in the wrong places. An example of this
is the *is_logged_in()* function. I should (and will eventually) write
a CI helper for this, but in the meantime it's redundant and insecure, and
I wouldn't dare attempt use it in production. **as of a few hours later, 
there is now a blog_helper, which is autoloaded.**

Note: Each model class name is suffixed with *_model*. This is so names 
don't clash.

####Models

* models
* * auth
* * * login
* * * signup
* * frontend
* * * list_blogs
* * manageblogs
* * * read
* * * update
* * * get_blog
* * * delete
* * stats
* * * count_posts
* * * count_pages
* * * count_tags
* * * user

#####auth

**login**

This checks the username and password against what's in the database.

**signup**

This inserts the user info given into the database. The password is 
salted/hashed with the encryption key given in the CI config file.

-----------------------

####frontend

**list_blogs**

Grabs everything from the 'blogs' table, with the limit and offset set
in the controller, to work with pagination.

-----------------------

#####manageblogs

**create**

This creates a blog.

**read**

This grabs everything from the blogs table, and orders it according
to date, descending from the newest. Results are an array.

**update**

This is an update query. Only the title, tags, and text are updated,
the timestamp and URL slug stay the same, so updating it doesn't
push it to the top, or break permalinks.

**get_blog**

This gets an individual blog, according to the ID number in the DB.
My crystal ball tells me that getting it by title is in the plans, 
because SEO etc etc.

**delete**

Delete's the individual blog, according to the ID field.

-----------------------

#####stats

**count_posts**

Counts the blog posts in the blogs database table. Returns an int.

**count_pages**

Counts the pages in the pages database table. Returns an int.

**count_tags**

This is a logistical nightmare. First thing, it gets everything
in an array from the blogs table. It then loops through
this array, exploding all the tags by ','. Then, in a nested loop
it loops through that array, and pushes each tag into a new array.
After the loop is finished, it returns a count (int) of the big 
array of tags. It is at this point that I tell you that, twice, as
an infant, my mother dropped me. Once from a shopping cart, another
from a car.

**user_info**
This just grabs everything we have stored about the user from the 
auth table in the database.