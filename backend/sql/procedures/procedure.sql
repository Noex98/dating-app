DROP PROCEDURE RegisterUser;

DELIMITER //
CREATE PROCEDURE RegisterUser (
    in firstnameVar VARCHAR(100),
    in lastnameVar VARCHAR(100),
    in emailVar VARCHAR(100),
    in usernameVar VARCHAR(100),
    in userpasswordVar VARCHAR(100)
)
BEGIN

    DECLARE EXIT HANDLER FOR SQLEXCEPTION, SQLWARNING
    BEGIN
        ROLLBACK;
        SELECT 'Rollback happened due to an error: ' ErrorMessage;
    END;

    START TRANSACTION;
        IF
            NOT EXISTS (SELECT email FROM userprofile WHERE email = emailVar)
        THEN
            INSERT INTO userprofile
                (firstname, lastname, email, username)
            VALUES
                (firstnameVar, lastnameVar, emailVar, usernameVar);

            INSERT INTO userlogin (user_password) VALUES (userpasswordVar);

            INSERT INTO userSettings (darkmode) VALUES (false);
        END IF;
    COMMIT;
END//

DELIMITER ;