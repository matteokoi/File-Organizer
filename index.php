<?php
$source_dir = getcwd(); // Get the current directory path
$move_or_copy = 'move'; 
$category_extensions = [
    'images' => ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'tiff', 'raw', 'psd', 'ico', 'svg', 'webp'],
    'documents' => ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'odt', 'ods', 'odp', 'txt', 'rtf', 'tex', 'epub', 'mobi'],
    'videos' => ['mp4', 'avi', 'mov', 'mkv', 'flv', 'webm', 'wmv', 'mpg', 'mpeg', '3gp', '3g2'],
    'audio' => ['mp3', 'wav', 'ogg', 'flac', 'aac', 'aiff', 'm4a', 'wma'],
    'archives' => ['zip', 'rar', 'tar', 'gz', '7z', 'bz2', 'jar', 'war', 'ear'],
    'code' => ['py', 'js', 'php', 'html', 'css', 'java', 'cpp', 'c', 'rb', 'swift', 'rs', 'go', 'scala', 'clj', 'dart', 'kt'],
    'text' => ['txt', 'md', 'log', 'csv', 'json', 'xml', 'yaml', 'toml', 'ini', 'conf', 'cfg', 'env'],
    'spreadsheets' => ['xls', 'xlsx', 'ods', 'csv', 'tsv'],
    'presentations' => ['ppt', 'pptx', 'odp', 'key'],
    'databases' => ['sql', 'db', 'sqlite', 'accdb', 'mdb'],
    'fonts' => ['ttf', 'otf', 'woff', 'woff2', 'eot'],
    '3d' => ['stl', 'obj', 'dae', 'blend'],
    'vector' => ['ai', 'eps', 'svg'],
    'misc' => ['apk', 'exe', 'dll', 'sys', 'bin', 'img', 'iso', 'dmg']
];

foreach (scandir($source_dir) as $file) {
    if ($file !== '.' && $file !== '..') {
        $file_path = $source_dir . DIRECTORY_SEPARATOR . $file;
        if (is_file($file_path)) {
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $category = null;
            foreach ($category_extensions as $key => $extensions) {
                if (in_array(strtolower($extension), array_map('strtolower', $extensions))) {
                    $category = $key;
                    break;
                }
            }
            if ($category !== null) {
                $target_dir = $source_dir . DIRECTORY_SEPARATOR . $category;
                if (!is_dir($target_dir)) {
                    mkdir($target_dir);
                }
                $target_path = $target_dir . DIRECTORY_SEPARATOR . $file;
                if ($move_or_copy === 'move') {
                    rename($file_path, $target_path);
                } else {
                    copy($file_path, $target_path);
                }
                echo "Moved/Copied $file to $category folder.\n";
            } else {
                echo "Skipped $file (no category found).\n";
            }
        }
    }
}
?>