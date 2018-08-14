# GitHub基本使用
1. 在文件夹中使用`git init`，会在文件夹中生成一个**.git**的文件夹。
2. 在文件夹中创建一个`text.txt`文件。
3. 在命令行中输入`git status`，会显示未跟踪的文件。
4. 使用`git add text.txt`将文件添加到跟踪列表。`git add -A`将所有修改的文件添加到跟踪列表。
5. `git commit -m '备注信息'`提交更新。
6. `git log`查看日志;`git reflog`查看历史版本。
7. `git reset --hard + 版本号前七位`退回某个版本。
8. `git clean -xf`删除未跟踪的文件。

# 连接到GitHub
1. 配置用户名和邮箱：
`git config --global user.name "你的用户名"`
`git config --global user.email "你的邮箱"`
2. 生成ssh key `ssh-keygen -t rsa -C "你的邮箱"`，输入完一直回车就行。
3. 复制公钥 `clip < ~/.ssh/id_rsa.pub`。
4. 登录**GitHub**后台，在setting -> SSH and GPG keys中添加公钥。
5. `ssh -T git@github.com` 测试**GitHub**是否连接成功。
6. `git remote add origin 你复制的地址` 建立远程连接。
7. `git push -u origin master` 提交代码。以后只需要输入 `git push`即可。
8. `git branch dev` 新建一个**dev**分支。
9. `git checkout dev` 切换到**dev**分支。
10. `git merge dev` 分支合并。

# 本项目使用方法
1. `git clone 项目地址`，然后进入项目。
2. `composer install`。
3. 新建.env文件，配置数据库信息 （数据库在bookstore.sql中），然后运行 `php artisan key:generate`。
4. web服务器访问public目录。访问成功！
