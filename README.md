Less space, less inodes. EXPERIMENT with Joomla!
------------------------------------------------
As mentioned above, this is a space saving version of Joomla! CMS™ (based on 3.8.6). That means - if you have multiple Joomla sites then only one of them is a "full" Joomla. Others are reading most of the code (extensions, libraries, media) from this "main" site via symlinks. FOR TESTING PURPOSES ONLY. PRs are very welcome. 

Normally if your multiple sites are using (mainly) similar extensions you have to install them for each site separately. That means also files in filesystem. But some extensions (like [Fabrik](https://github.com/Fabrik/fabrik)) could have enormously code files, even more than Joomla itself with core extensions. And now let's imagine that every J! site in your server need this extension. 

Some shared host providers are counting also inodes (number of files and folders) and set different inode limits for different hosting plans. So even if you have enough free space you still can exceeded inode limit and you have to choose more expensive plan. This little experiment is aimed to find a good way to avoid such situations.

With this code you can 
* replace your existing Joomla installations - then you most probably continue using an existing database
* install completely new Joomla site - then you can choose whether you want to share the database with an existing site or use a separate one
* create access to an existing Joomla site from an alternate URL - then you will not create any new database.  

HOW?
* clone the code to your computer and upload it to server
* if you are not sure whether your server supports symlinks, rename the htaccess.txt to .htaccess (or create new one just with Options +FollowSymLinks)
* if you want to use existing db tables (i.e to "convert" an old site or create an alterate access point) then you have to upload configuration.php first. It MUST BE filled with needed credentials before you continue. 
* open the new site url, follow the instructions and submit the form with needed data
* new page with results and further instructions opens
* at the same time the initial index.php should be autmatically renamed to index.php-old while index.php-dist should be renamed to index.php (and that's the J! original file).
* click on your site url - it opens now the installer. With prefilled configuration.php it says that your site is installed, so delete the installation directory. If you are installing a new site you just pass a standard installation process from very beginning.

Go ahead!

Regards

Jaanus Nurmoja

Joomla! CMS™ [![Analytics](https://ga-beacon.appspot.com/UA-544070-3/joomla-cms/readme)](https://github.com/igrigorik/ga-beacon)
====================

Build Status
---------------------
| Travis-CI  | Drone-CI | AppVeyor | Jenkins |
| ------------- | ------------- | ------------- | ------------- |
| [![Build Status](https://travis-ci.org/joomla/joomla-cms.svg?branch=staging)](https://travis-ci.org/joomla/joomla-cms)  | [![Build Status](http://213.160.72.75/api/badges/joomla/joomla-cms/status.svg)](http://213.160.72.75/joomla/joomla-cms)  | [![Build status](https://ci.appveyor.com/api/projects/status/bpcxulw6nnxlv8kb/branch/staging?svg=true)](https://ci.appveyor.com/project/joomla/joomla-cms)  | [![Build Status](http://build.joomla.org/job/cms/badge/icon)](http://build.joomla.org/job/cms/)  |

What is this?
---------------------
* This is a Joomla! 3.x installation/upgrade package.
* Joomla's [Official website](https://www.joomla.org).
* Joomla! 3.8 [version history](https://docs.joomla.org/Special:MyLanguage/Joomla_3.8_version_history).
* Detailed changes are in the [changelog](https://github.com/joomla/joomla-cms/commits/staging).

What is Joomla?
---------------------
* [Joomla!](https://www.joomla.org/about-joomla.html) is a **Content Management System** (CMS) which enables you to build websites and powerful online applications.
* It is a simple and powerful web server application which requires a server with PHP and either MySQL, PostgreSQL or SQL Server to run. You can find [full technical requirements here](https://downloads.joomla.org/technical-requirements).
* Joomla! is **free and Open Source software** distributed under the GNU General Public License version 2 or later.

Is Joomla! for you?
---------------------
* Joomla! is [the right solution for most content web projects](https://docs.joomla.org/Special:MyLanguage/Portal:Learn_More).
* View Joomla's [core features here](https://www.joomla.org/core-features.html).
* Try it out for yourself in our [online demo](https://demo.joomla.org).

How to find a Joomla! translation?
---------------------
* Repository of [accredited language packs](https://community.joomla.org/translations.html).
* You can also [add languages](https://docs.joomla.org/Special:MyLanguage/J3.x:Setup_a_Multilingual_Site/Installing_New_Language) directly to your website via your Joomla! administration panel.
* Learn how to [setup a Multilingual Joomla! Site](https://docs.joomla.org/Special:MyLanguage/J3.x:Setup_a_Multilingual_Site)

Learn Joomla!
---------------------
* Read ['Getting Started with Joomla!'](https://docs.joomla.org/Special:MyLanguage/J3.x:Getting_Started_with_Joomla!) to learn the basics.
* Before installing, read the ['Beginners' Guide'](https://docs.joomla.org/Special:MyLanguage/Portal:Beginners).

What are the benefits of Joomla?
---------------------
* The functionality of a Joomla! website can be extended by installing extensions that you can create (or download) to suit your needs.
* There are many ready-made extensions that you can download and install.
* Check out the [Joomla! Extensions Directory (JED)](https://extensions.joomla.org).

Is it easy to change the layout display?
---------------------
* The layout is controlled by templates that you can edit.
* There are a lot of ready-made professional templates that you can download.
* Template management information is [available here](https://docs.joomla.org/Special:MyLanguage/Portal:Template_Management).

Ready to install Joomla?
---------------------
* Check the [minimum requirements](https://downloads.joomla.org/technical-requirements). 
* How do you [install Joomla](https://docs.joomla.org/Special:MyLanguage/J3.x:Installing_Joomla)?
* You could start your Joomla! experience by [building your site on a local test server](https://docs.joomla.org/Special:MyLanguage/Installing_Joomla_locally).
When ready, it can be moved to an online hosting account of your choice.

Updates are free!
---------------------
* Always use the [latest version](https://downloads.joomla.org/latest).

Where can you get support and help?
---------------------
* [The Joomla! Documentation](https://docs.joomla.org/Special:MyLanguage/Main_Page);
* [Frequently Asked Questions](https://docs.joomla.org/Special:MyLanguage/Category:FAQ) (FAQ);
* Find the [information you need](https://docs.joomla.org/Special:MyLanguage/Start_here);
* Find [help and other users](https://www.joomla.org/about-joomla/create-and-share.html);
* Post questions at [our forums](https://forum.joomla.org);
* [Joomla Resources Directory](https://resources.joomla.org) (JRD).

Do you already have a Joomla! site that isn't built with Joomla! 3.x?
---------------------
* What's [new in Joomla! 3.x](https://www.joomla.org/3)?
* What are the [main differences between 2.5 and 3.x](https://docs.joomla.org/Special:MyLanguage/What_are_the_major_differences_between_Joomla!_2.5_and_3.x%3F)?
* How to [migrate from 2.5.x to 3.x](https://docs.joomla.org/Special:MyLanguage/Joomla_2.5_to_3.x_Step_by_Step_Migration).
* How to [migrate from 1.5.x to 3.x](https://docs.joomla.org/Special:MyLanguage/Joomla_1.5_to_3.x_Step_by_Step_Migration).

Do you want to improve Joomla?
--------------------
* Where to [request a feature](https://issues.joomla.org)?
* How do you [report a bug](https://docs.joomla.org/Special:MyLanguage/Filing_bugs_and_issues) on the [Issue Tracker](https://issues.joomla.org)?
* Get Involved: Joomla! is community developed software. [Join the community](https://volunteers.joomla.org).
* Documentation for [Developers](https://docs.joomla.org/Special:MyLanguage/Portal:Developers).
* Documentation for [Web designers](https://docs.joomla.org/Special:MyLanguage/Web_designers).

Copyright
---------------------
* Copyright (C) 2005 - 2018 Open Source Matters. All rights reserved.
* [Special Thanks](https://docs.joomla.org/Special:MyLanguage/Joomla!_Credits_and_Thanks)
* Distributed under the GNU General Public License version 2 or later
* See [License details](https://docs.joomla.org/Special:MyLanguage/Joomla_Licenses)
