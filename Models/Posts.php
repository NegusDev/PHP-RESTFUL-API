<?php 

class Posts extends Db{

	public function readPosts() {
		$sql = "SELECT * FROM posts";
		$result = $this->conn->query($sql) or die($this->conn->error);
		 if ($result->num_rows > 0) {
		 	while ($row = $result->fetch_assoc()) {
	                $posts[] = $row;
            }
		 }
		  return $posts ?? [];
	}
	public function readSinglePost($post_id) {
		$sql = "SELECT * FROM posts WHERE `post_id` = $post_id LIMIT 1";
		$result = $this->conn->query($sql) or die($this->conn->error);
		 if ($result->num_rows > 0) {
		 	while ($row = $result->fetch_assoc()) {
	                $post = $row;
            }
		 }
		  return $post;
	}

	public function createPost($data) {
		$columns = implode(',', array_keys($data));
        $values = "'" . implode("','", array_values($data)) . "'";

        $sql = sprintf("INSERT INTO %s(%s) VALUES(%s)", 'posts', $columns, $values);
        $result = $this->conn->query($sql) or die($this->conn->error);
        return $result;
	}

	public function insertPost($journalist_id, $category, $title, $body) {
		if (isset($journalist_id) && isset($category) && isset($title) && isset($body)) {
			$data = [
				"journalist_id" => htmlspecialchars(strip_tags($journalist_id)),
				"category" => htmlspecialchars(strip_tags($category)),
				"title" => htmlspecialchars(strip_tags($title)),
				"body" => htmlspecialchars(strip_tags($body))
			];
		}

		$result = $this->createPost($data);
	}

	public function update($post_id,$author_id,$category,$title,$body) {
		$sql = "UPDATE posts SET journalist_id ='$author_id', category = '$category',  title = '$title', body = '$body' WHERE post_id = $post_id";
        $result = $this->conn->query($sql) or die($this->conn->error);
        if ($result) {
            return true;
        }else {
            return false;
        }
	}

	public function deletePost($post_id) {
        $sql = "DELETE FROM posts WHERE post_id = $post_id";
        $result = $this->conn->query($sql) or die($this->conn->error);
        return $result;
    }


}