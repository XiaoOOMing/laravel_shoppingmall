# GitHub基本使用
---
1.在文件夹中使用`git init`，会在文件夹中生成一个**.git**的文件夹。
2.在文件夹中创建一个`text.txt`文件。
3.在命令行中输入`git status`，会显示未跟踪的文件。
4.使用`git add text.txt`将文件添加到跟踪列表。`git add -A`将所有修改的文件添加到跟踪列表。
5.`git commit -m '备注信息'`提交更新。
6.`git log`查看日志;`git reflog`查看历史版本。
7.`git reset --hard + 版本号前七位`退回某个版本。
8.`git clean -xf`删除未跟踪的文件。