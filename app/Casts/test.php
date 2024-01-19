CREATE OR REPLACE FUNCTION generate_random_niveau_interventions()
RETURNS VOID AS $$
DECLARE
    niveau_id INTEGER;

BEGIN
    FOR niveau_id IN (SELECT id FROM niveaux) LOOP    
        INSERT INTO lup_luc (niveau_id,statut_occupation,revenu_mensuel)
        VALUES(niveau_id,(ARRAY['propriétaire', 'locataire'])[floor(random() * 2) + 1],floor(random() * 8000) + 1)
    END LOOP;
END;
$$ LANGUAGE plpgsql;

SELECT generate_random_niveau_interventions();
