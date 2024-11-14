# File Organizer Script

## Description
A PHP script that organizes files in a specified directory by moving them into folders based on file type.

## Features
- Scans a directory and groups files into folders like `images`, `documents`, `videos`, etc.
- Supports a wide range of file extensions for each category.
- Allows you to choose whether to move or copy files.

## Usage
1. Make sure you have PHP installed on your system.
2. Place the `index.php` file in the directory you want to organize.
3. Open a command prompt or terminal and navigate to the directory containing the `index.php` file.
4. Run the script using the following command:

```
php index.php
```

The script will automatically organize the files in the current directory and create the necessary folders.

## Customization
You can customize the file extensions for each category by modifying the `$category_extensions` array in the `index.php` file.

## Example
```php
$category_extensions = [
    'images' => ['jpg', 'jpeg', 'png', 'gif', 'bmp'],
    'documents' => ['pdf', 'doc', 'docx', 'xls', 'xlsx'],
    'videos' => ['mp4', 'avi', 'mov', 'mkv'],
    'audio' => ['mp3', 'wav', 'ogg'],
    'archives' => ['zip', 'rar', 'tar', 'gz'],
];
```

## Note
- If you want to move the files instead of copying them, set the `$move_or_copy` variable to `'move'`.
- If you want to copy the files instead of moving them, set the `$move_or_copy` variable to `'copy'`.
