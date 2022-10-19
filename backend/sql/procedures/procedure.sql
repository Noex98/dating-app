DELIMITER //


CREATE DEFINER=`knickering_dk`@`%` PROCEDURE `RegisterUser`(
    in usernameVar varchar(50),
    in passwordVar varchar(60),
    in firstnameVar varchar(50),
    in lastnameVar varchar(50),
    in heightVar INT,
    in birthdayVar DATE,
    in genderVar varchar(50)
)
BEGIN

    DECLARE EXIT HANDLER FOR SQLEXCEPTION, SQLWARNING
    BEGIN
        ROLLBACK;
        SELECT 'Rollback happened due to an error: ' ErrorMessage;
    END;
    START TRANSACTION;
        IF
            NOT EXISTS (SELECT username FROM userLogin WHERE username = usernameVar)
        THEN
            INSERT INTO users
                (firstname, lastname, height, birthday, gender)
            VALUES
                (firstnameVar, lastnameVar, heightVar, birthdayVar, genderVar);
            
            INSERT INTO userLogin 
                (username, password) 
            VALUES 
                (usernameVar, passwordVar);
            INSERT INTO preferences () VALUES ();
        END IF;
    COMMIT;
END;


DELIMITER//
CREATE PROCEDURE EditUserProfile (
    IN idVar INT,
    IN firstnameVar VARCHAR(50), 
    IN lastnameVar VARCHAR(50), 
    IN birthdayVar date,
    IN genderVar VARCHAR(50),
    IN avatarVar VARCHAR(50), 
    IN heightVar int
)

BEGIN

    DECLARE EXIT HANDLER FOR SQLEXCEPTION, SQLWARNING
    BEGIN
        ROLLBACK;
        SELECT 'Rollback happened due to an error: ' ErrorMessage;
    END;

    START TRANSACTION;
        UPDATE users
        SET firstname = firstnameVar, 
        lastname = lastnameVar, 
        birthday = birthdayVar, 
        gender = genderVar, 
        avatar = avatarVar, 
        height = heightVar
        WHERE id = idVar; 
    COMMIT;
END//

DELIMITER;

