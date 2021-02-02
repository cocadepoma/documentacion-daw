<?php
######################### USERS QUERIES #########################
// If user IS ADMIN, will return 1. ELSE will return 0
function getIfAdmin($usr_name)
{
    $admin = 0;

    try {

        $conn = connectDB();
        if ($conn) {

            $sql = "SELECT ntipo FROM usuarios WHERE cnombre = :usr_name";
            $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $stmt->execute(array(':usr_name' => $usr_name));

            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($result['ntipo'] === '1') {
                    $admin = 1;
                }
            }

            $stmt->closeCursor();
            disconectDB($conn);
        }
    } catch (Exception $e) {
        header("location: ../index.php?bderror=true&typeerror=" . $e->getMessage());
    }

    return $admin;
}
// List user profile info whit his/her NAME
function getUsrInfo($usr_name)
{
    try {
        $conn = connectDB();

        if ($conn) {
            $sql = "SELECT ncodigo, cnombre FROM usuarios WHERE cnombre = :usr_name";
            $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $stmt->execute(array(':usr_name' => $usr_name));

            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $result['ncodigo'] . "</td>";
                echo "<td>" . $result['cnombre'] . "</td>";
                echo "</tr>";
            }
            $stmt->closeCursor();
            disconectDB($conn);
        }
    } catch (Exception $e) {
        header("location: ../index.php?bderror=true&typeerror=" . $e->getMessage());
    }
}
// Check if user already exists with his/her NAME
function checkIfUserExists($user_name)
{
    $match = false;

    try {
        $conn = connectDB();
        if ($conn) {

            $sql = "SELECT cnombre FROM usuarios";
            $result = $conn->query($sql);

            // Check if user already exists in DATABASE
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                if ($row['cnombre'] == $user_name) {
                    $match = true;
                }
            }
        } else {
            header("location: ../new-users.php?bderror=true");
        }
    } catch (Exception $e) {
        header("location: ../new-users.php?bderror=true&typeerror=" . $e->getMessage());
    }
    return $match;
}
// Check if NAME and PWD of users MATCH
function loginUser($login_user_name, $login_usr_pwd)
{
    $usr_match = false;
    try {
        $conn = connectDB();
        if ($conn) {
            $sql = "SELECT cnombre, cpwd FROM usuarios where cnombre = :usr_name";
            $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $stmt->execute(array(':usr_name' => $login_user_name));

            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

                if ($login_user_name == $result['cnombre']) {
                    if (password_verify($login_usr_pwd, $result['cpwd'])) {
                        $usr_match = true;
                    }
                }
            }

            $stmt->closeCursor();
            disconectDB($conn);
        } else {
            header("location: ../login.php?bderror=true");
        }
    } catch (Exception $e) {
        header("location: ../login.php?bderror=true&typeerror=" . $e->getMessage());
    }
    return $usr_match;
}
// Insert a new user to DB
function insertUser($user_name, $user_pwd, $user_type)
{
    try {
        $conn = connectDB();
        if ($conn) {

            $sql = "INSERT INTO usuarios (cnombre, cpwd, ntipo) VALUES (:usr_name, :usr_pwd, :usr_type)";
            $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

            if ($stmt->execute(array(':usr_name' => $user_name, ':usr_pwd' => $user_pwd, ':usr_type' => $user_type))) {
                $stmt->closeCursor();
                disconectDB($conn);
                header("location: ../new-users.php?creating=true");
            } else {
                $stmt->closeCursor();
                disconectDB($conn);
                header("location: ../new-users.php?creating=false");
            }
        } else {
            header("location: ../new-users.php?bderror=true");
        }
    } catch (Exception $e) {
        header("location: ../new-users.php?bderror=true&typeerror=" . $e->getMessage());
    }
}
#################################################################



######################## CLIENTS QUERIES ########################
// List full clients
function getAllClients()
{
    try {

        $conn = connectDB();
        if ($conn) {

            $sql = "SELECT ncodigo, ccif, cnombre, capellidos, cdireccion FROM clientes ORDER BY ncodigo ASC";
            $stmt = $conn->query($sql);

            while ($result = $stmt->fetch()) {
                echo "<tr>";
                echo "<td>" . $result['ncodigo'] . "</td>";
                echo "<td>" . $result['ccif'] . "</td>";
                echo "<td>" . $result['cnombre'] . "</td>";
                echo "<td>" . $result['capellidos'] . "</td>";
                echo "<td>" . $result['cdireccion'] . "</td>";
                echo "</tr>";
            }

            $stmt->closeCursor();
            disconectDB($conn);
        }
    } catch (Exception $e) {
        header("location: ../index.php?bderror=true&typeerror=" . $e->getMessage());
    }
}
// Delete client with the ID
function deleteClient($id)
{
    try {
        $conn = connectDB();
        if ($conn) {

            $sql = "DELETE FROM clientes WHERE ncodigo = :client_id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':client_id', $id, PDO::PARAM_INT);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                header('location: ../index.php?deletion=true');
            } else {
                header('location: ../borrar.php?deletion=false');
            }
            $stmt->closeCursor();
            disconectDB($conn);
        } else {
            header("location: ../borrar.php?bderror=true");
        }
    } catch (Exception $e) {
        header("location: ../borrar.php?bderror=true&typeerror=" . $e->getMessage());
    }
}
// Check if a client ID is already registered
function checkIfClientExists($id)
{
    $exists = false;

    try {
        $conn = connectDB();
        if ($conn) {

            $sql = "SELECT ncodigo FROM clientes WHERE ncodigo = :client_id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':client_id', $id, PDO::PARAM_INT);
            $stmt->execute();

            while ($result = $stmt->fetch()) {
                if ($result['ncodigo'] == $id) {
                    $exists = true;
                }
            }

            $stmt->closeCursor();
            disconectDB($conn);
        } else {
            header("location: ../altas.php?bderror=true");
        }
    } catch (Exception $e) {
        header("location: ../altas.php?bderror=true&typeerror=" . $e->getMessage());
    }
    return $exists;
}
// Insert a new client
function insertClientByID($client_ID = null, $client_CIF = '', $client_name = '', $client_surname = '', $client_phone = '', $client_address = '')
{
    try {
        $data = [
            ':client_id' => $client_ID,
            ':client_cif' => $client_CIF,
            ':client_name' => $client_name,
            ':client_surname' => $client_surname,
            ':client_phone' => $client_phone,
            ':client_address' => $client_address,
        ];

        $conn = connectDB();

        if ($conn) {

            $sql = "INSERT INTO clientes (ncodigo, ccif, cnombre, capellidos, ctelefono, cdireccion) 
                    VALUES (:client_id, :client_cif, :client_name, :client_surname, :client_phone, :client_address)";
            $stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

            if ($stmt->execute($data)) {
                $stmt->closeCursor();
                disconectDB($conn);
                header("location: ../index.php?insert=true");
            } else {
                $stmt->closeCursor();
                disconectDB($conn);
                header("location: ../altas.php?insert=false");
            }
        } else {
            header("location: ../altas.php?bderror=true");
        }
    } catch (Exception $e) {
        header("location: ../altas.php?bderror=true&typeerror=" . $e->getMessage());
    }
}
#################################################################
