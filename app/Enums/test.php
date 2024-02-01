DO $$ 
DECLARE 
    max_id INT;
BEGIN
    SELECT MAX(id) INTO max_id FROM bordereaux;
  
    IF max_id IS NOT NULL THEN
        
        EXECUTE 'ALTER SEQUENCE bordereaux_id_seq RESTART WITH ' || (max_id + 1);
    END IF;
END $$;
