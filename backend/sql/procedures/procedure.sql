DROP PROCEDURE RegisterUser;

DELIMITER //
CREATE PROCEDURE RegisterUser (
    in usernameVar,
    in passwordVar,

    in firstnameVar,
    in lastnameVar,
    in heightVar,
    in birthdayVar,
    in genderVar,
    in avatarVar,
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
            INSERT INTO users
                (firstname, lastname, height, birthday, gender, avatar)
            VALUES
                (firstnameVar, lastnameVar, heightVar, birthdayVar, genderVar, avatarVar);

            INSERT INTO userlogin 
            (username, password) 
            VALUES 
            (usernameVar, passwordVar);
        END IF;
    COMMIT;
END//

DELIMITER ;