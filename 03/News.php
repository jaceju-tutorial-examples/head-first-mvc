<?php
// News.php
class News {

    private $_link = null;
    
    public function __construct() {
        $this->_link = mysql_connect('127.0.0.1', 'username', 'password');
        mysql_query('SET NAMES utf8');
        mysql_select_db('mvc', $this->_link);
    }
    
    public function __destruct() {
        mysql_close($this->_link);
    }

    public function findAll() {
        
        $sql = "SELECT * FROM news "
             . "WHERE onlineDateTime <= NOW() "
             . "AND NOW() < offlineDateTime ORDER BY id";
        $result = mysql_query($sql, $this->_link);

        $newsList = array();
        while ($row = mysql_fetch_assoc($result)) {
            $newsList[] = $row;
        }
        return $newsList;        
    }
    
    public function find($id) {
        $sql = "SELECT * FROM news "
             . "WHERE onlineDateTime <= NOW() "
             . "AND NOW() < offlineDateTime AND id = $id";
        $result = mysql_query($sql, $this->_link);

        return mysql_fetch_assoc($result);
    }
}
