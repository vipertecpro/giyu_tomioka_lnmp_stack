# Customizable Content Management System (CCMS)
## Project Overview

This project is a **Customizable Content Management System (CMS)** designed to allow developers to create and manage content for websites and web applications. The CMS is built using Laravel, a popular PHP framework, and is designed to be flexible and customizable to fit the needs of different projects.

## Important Commands
### **How to create new module:**
- With this command, you can create a new module with default components, and optionally, add more components if needed. 
  - Create a new module with default only migration as default component:
    ```bash
    php artisan make:module Newsletter
    ```
  - To create other components, you can add the following options:
    ```bash
    php artisan make:module Newsletter --model --controller --seeder --notification --event --listener
    ```
### How to remove a module:
- With this `remove:module` command, you can remove the components associated with a module: 
    - Remove all components for a module:
    
        Simply run the command without any options to remove everything associated with the module:
        ```bash
        php artisan remove:module Newsletter
        ```
    - Remove specific components only:

        You can still specify the components you want to remove:
        ```bash
        php artisan remove:module Newsletter --model --controller
        ```

You can extend these command further by adding additional options or modifying existing ones to fit your specific project needs. The goal is to create a flexible and efficient workflow that matches the structure and requirements of your CMS project.

This approach keeps your codebase clean and organized, especially when modules are no longer needed.


Sample project structure:
```
php artisan make:module Role --model --seeder --controller
php artisan make:module UserRole --model --seeder --controller
php artisan make:module RolePermission --model --seeder --controller
php artisan make:module Permission --model --seeder --controller
php artisan make:module Page --model --seeder --controller
php artisan make:module Blog --model --seeder --controller
php artisan make:module Tag --model --seeder --controller
php artisan make:module BlogTag
php artisan make:module BlogCategory
php artisan make:module Category --model --seeder --controller
php artisan make:module Comment --model --seeder --controller
php artisan make:module Metadata --model --seeder
php artisan make:module GlobalSetting --model --seeder --controller
```

-------
# I AM WORKING ON IT  :D

-------


## Contribution

Contributions are welcome! Please follow the standard [GitHub Flow](https://guides.github.com/introduction/flow/) when contributing to this project.

## Contact

For any queries or issues, please contact [vipertecpro](mailto:vipertecpro@gmail.com).

---

Feel free to customize this template to fit your project's specific details!
