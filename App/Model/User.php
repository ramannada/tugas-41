<?php
namespace App\Model;

use App\Model\Base;

class User extends Base
{
    public $message;
    public function showAll()
    {
        $stmt = self::getDb()->prepare("SELECT username, email, photo
            FROM user");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function showByUsername($username)
    {
        $stmt = self::getDb()->prepare("SELECT username, email, photo
            FROM user where username = :un");
        $stmt->bindParam(':un', $username);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function addUser($user)
    {
        $cek = $this->cekUsername($user['username']);

        if ($cek == true) {
            $this->message = "Username sudah ada";
            return $this->message;
        } else {
            $stmt = self::getDb()->prepare("INSERT INTO user
                (username, email, password, photo) VALUES (:user, :email, :password,
                :photo)");
            $stmt->bindParam(':user',$user['username']);
            $stmt->bindParam(':email', $user['email']);
            $stmt->bindParam(':password',$user['password']);
            $stmt->bindParam(':photo', $user['photo']);
            $stmt->execute();

            $this->cekBerhasil($user['username']);
        }
    }
    public function updateUser($user)
    {
        if ($user['userlama'] === $user['userbaru']) {
            $stmt = self::getDb()->prepare("UPDATE user SET username=:un,
                email=:email, photo=:photo WHERE username=:user");
            $stmt->bindParam(":user",$user['userlama']);
            $stmt->bindParam(":un",$user['userbaru']);
            $stmt->bindParam(":email",$user['email']);
            $stmt->bindParam(":photo",$user['photo']);
            $stmt->execute();

            $this->cekBerhasil($user['userbaru']);
        } else {
            $cek = $this->cekUsername($user['userbaru']);
            if ($cek == true) {
                $this->message = "Username sudah ada";
                return $this->message;
            } else {
                $stmt = self::getDb()->prepare("UPDATE user SET username=:un,
                    email=:email, photo=:photo WHERE username=:user");
                $stmt->bindParam(":user",$user['userlama']);
                $stmt->bindParam(":un",$user['userbaru']);
                $stmt->bindParam(":email",$user['email']);
                $stmt->bindParam(":photo",$user['photo']);
                $stmt->execute();

                $this->cekBerhasil($user['userbaru']);
            }
        }
    }
    public function cekUsername($username)
    {
        $stmt = self::getDb()->prepare("SELECT username FROM user WHERE
            username=:un");
        $stmt->bindParam(":un",$username);
        $stmt->execute();
        if (!empty($stmt->fetch())) {
            return true;
        } else {
            return false;
        }
    }
    public function cekBerhasil($user)
    {
        $cek = $this->cekUsername($user);
        if ($cek == true) {
            $this->message = "sukses";
        } else {
            $this->message = "gagal";
        }
        return $this->message;
    }
}
?>
