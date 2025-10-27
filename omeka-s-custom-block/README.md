## File Structure

```
module.php
config/
    module.config.php
    module.ini
src/
    Site/
        BlockLayout/
            HelloWorld.php
view/
    common/
        block-layout/
            hello-world-form.phtml
            hello-world.phtml
```

---

## File Descriptions

- **[`module.php`](module.php )**  
  Main module class. Loads configuration from [`config/module.config.php`](config/module.config.php ).

- **[`config/module.ini`](config/module.ini )**  
  Module metadata such as name, description, author, version, and Omeka version constraint.

- **[`config/module.config.php`](config/module.config.php )**  
  Registers the block layout and sets the view template path.

- **[`src/Site/BlockLayout/HelloWorld.php`](src/Site/BlockLayout/HelloWorld.php )**  
  Implements the block layout logic and inherits from AbstractBlockLayout:
  - `getLabel()`: Returns block label.
  - `form()`: Renders the block configuration form.
  - `render()`: Renders the block output.

- **[`view/common/block-layout/hello-world-form.phtml`](view/common/block-layout/hello-world-form.phtml )**  
  Form for entering the block's heading and message on the admin view

- **[`view/common/block-layout/hello-world.phtml`](view/common/block-layout/hello-world.phtml )**  
  Displays the block with heading and message, for the public view.