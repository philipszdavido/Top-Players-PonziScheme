<?php
class Post{
 private $db=0;
 function __construct($db){
 $this->_db = $db;
 }
 public function get_related_post($category){
 $query="SELECT * FROM blog_posts WHERE Category='".$category."' LIMIT 6";
 $result=mysql_query($query,$this->_db);
  return $result;
 }
 public function get_popular_post(){
 $query="SELECT * FROM blog_posts ORDER BY Views LIMIT 6";
 $result=mysql_query($query,$this->_db);
  return $result;
 }
 public function get_recent_post(){
 $q="SELECT * FROM blog_posts ORDER BY postDate LIMIT 6";
 $resul=mysql_query($q,$this->_db);
  return $resul;
 }
 public function get_post_of_month(){
 $query="SELECT * FROM blog_posts WHERE MONTH(postDate)=MONTH(NOW()) ORDER BY Views LIMIT 6";
 $result=mysql_query($query,$this->_db);
 return $result;
 }
 public function get_categories(){
 $query="SELECT * FROM blog_category";
 $result=mysql_query($query,$this->_db);
 return $result;
 }
 public function get_no_of_comments($id){
 $query="SELECT * FROM blog_comments WHERE post_id=".$id;
 return mysql_num_rows(mysql_query($query,$this->_db)); 
 }
 public function get_recent_comments(){
 $query="SELECT * FROM blog_comments ORDER BY c_date DESC";
 return mysql_query($query,$this->_db);
 }
 public function get_post($id){
  $query="SELECT * FROM blog_posts WHERE postID=".$id." ORDER BY postDate DESC LIMIT 1";
 return mysql_query($query,$this->_db);
 }
 }
?>