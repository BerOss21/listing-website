CREATE OR REPLACE FUNCTION generate_random_batiment_interventions()
RETURNS VOID AS $$
DECLARE
    batiment_id INTEGER;

BEGIN
    FOR batiment_id IN (SELECT id FROM batiments) LOOP    
        update batiments set affaire_id=(select id from affaires ordrer by random() limit 1)
        where id=batiment_id
    END LOOP;
END;
$$ LANGUAGE plpgsql;

SELECT generate_random_batiment_interventions();
