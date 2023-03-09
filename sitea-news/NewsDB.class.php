<?php
require_once 'INewsDB.class.php';

class NewsDB {
    const DB_NAME = 'news.db';
    private $_db;

    public function __construct() {
        if (is_file(self::DB_NAME) && filesize(self::DB_NAME) > 0) {
            $this->_db = new PDO("sqlite: news.db");
        } else {
            $this->_db = new PDO("sqlite: news.db");
            $sql = "CREATE TABLE msgs(
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    title TEXT,
                    category INTEGER,
                    description TEXT,
                    source TEXT,
                    datetime INTEGER
                )";
            $this->_db->exec($sql) or die();
            $sql = "CREATE TABLE category(
                    id INTEGER,
                    name TEXT
                )";
            $this->_db->exec($sql) or die();

            $sql = "INSERT INTO category(id, name)
                SELECT 1 as id, 'Политика' as name
                UNION SELECT 2 as id, 'Культура' as name
                UNION SELECT 3 as id, 'Спорт' as name";
            $this->_db->exec($sql) or die();
        }
    }

    public function __destruct() {
        unset($this->_db);
    }

    public function saveNews($title, $category, $description, $source, $dt) {
        $dt = time();
        $sql = "INSERT INTO msgs(title, category, description, source, datetime)
                VALUES (:title, :category, :description, :source, :datetime)";

        $stmt = $this->_db->prepare($sql);

        $stmt->execute([
            'title' => $title,
            'category' => $category,
            'description' => $description,
            'source' => $source,
            'datetime' => $dt
        ]);

        return $stmt->rowCount() > 0;
    }

    public function getNews() {
        $sql = "SELECT msgs.id as id, title, category.name as category, description, source, datetime FROM msgs, category
                WHERE category.id = msgs.category ORDER BY msgs.id DESC";

        $stmt = $this->query($sql);
    }   
}
?>