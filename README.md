Yii2 flash message
==================

**What is flash message**

There exists a generic system to show users that an action was performed successfully, or more importantly, failed. This system is known as "flash messages".

![enter image description here](https://www.webforefront.com/static/images/beginningdjango/Figure_2-4.png)



**What is yii2 flash?**

Yii2 flash provide an easiest way to show flash message



**INSTALL**

Begin by pulling in the package through Composer
>composer require wyno/yii2-flash "dev-master"




**Usage**

You may use helper to generate flash messages like this

>flash()->success('Some message to notify');
