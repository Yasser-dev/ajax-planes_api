CREATE TABLE planes
(
    planeid INT NOT NULL
    AUTO_INCREMENT,
                    model VARCHAR
    (30) NOT NULL,
                   manufacturer VARCHAR
    (30) NOT NULL,
                    manufacturedAt DATE,
                    trips INT DEFAULT 0,
                    CONSTRAINT planes_pk PRIMARY KEY
    (planeid)
    );