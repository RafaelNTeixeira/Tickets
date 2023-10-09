# Tickets

- Website developed for solving tickets submitted by the users

- **Used Programming Languages:** HTML, CSS, PHP, JavaScript


## Here are some available accounts for each type of user on our website:
- **Client:** 
  - Email: harry@gmail.com
  - Password: harry

- **Agent:**
  - Email: adele@gmail.com
  - Password: adele

- **Admin:**
  - Email: brunosduvane@gmail.com
  - Password: Sivane.2015

## Small corrections to make some features work:
- **In actions/edit-profile-action.php, line 14:**
  - Replace with: ```$password = password_hash($_POST['password'],PASSWORD_DEFAULT);```

- **In templates/index.tpl.php, line 92:**
  - Replace with: ```<a href="pages/Ongoing-page.php">Ongoing</a>```
  
## To execute simply do php -S localhost:9000



[![Open in Visual Studio Code](https://classroom.github.com/assets/open-in-vscode-c66648af7eb3fe8bc4f294546bfd86ef473780cde1dea487d3c4ff354943c9ae.svg)](https://classroom.github.com/online_ide?assignment_repo_id=10524156&assignment_repo_type=AssignmentRepo)
