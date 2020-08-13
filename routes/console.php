<?php

Artisan::command('about:lara', function () {
    $this->info("Lara是一款基于Laravel框架6.x版本开发的个人博客系统，它灵活轻巧，简单易用并易于扩展，适合搭建个人博客或作为企业 CMS 使用。");
})->describe('显示 Lara 博客系统简介');
