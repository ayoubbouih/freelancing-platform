--REALISER PAR:
    -- Abdessalam Bahafid
    -- Ayoub BOUIHROUCHANE
-------------------------------C7----------------------------------
set serveroutput on;
DECLARE
    CURSOR C_pilote IS
        SELECT nom, sal, comm
        FROM pilote
        WHERE nopilot BETWEEN 1280 AND 1999 FOR UPDATE;
    v_nom pilote.nom%type;
    v_sal pilote.sal%type;
    v_comm pilote.comm%type;
BEGIN
    open C_pilote;
    loop
        fetch C_pilote into v_nom, v_sal, v_comm;
        exit when C_pilote%notfound;
        if v_comm > v_sal then
            update pilote set sal=v_sal+v_comm, comm=0 where current of C_pilote;
        end if;
        if v_comm is null then
            DBMS_OUTPUT.PUT_LINE(v_nom);
            delete from pilote where current of C_pilote;
        end if;
    end loop;
END;
/
-------------------------------C8----------------------------------
--Table ERREUR dans lequel en insere les resultats
create table erreur(id_pilote varchar2(4), message varchar2(30));
/
create or replace procedure TrouverPilote(ide varchar2) is
p pilote%rowtype;
begin
    select * into p from pilote where nopilot=ide;
    insert into erreur values(ide, p.nom||' PILOTE-OK');
    if p.comm > p.sal then
        insert into erreur values(ide, p.nom||' PILOTE, COMM >SAL');
    end if;
exception
    when no_data_found then
        insert into erreur values(ide, 'PILOTE INCONNU');
end;
/
--Block PL/SQL Principale pour tester la procedure 
begin
    TrouverPilote('1333');
    dbms_output.put_line('tâche terminée avec succès');
end;
/
select * from erreur;
/
-------------------------------D1----------------------------------
create or replace view v_pilote as select * from pilote where ville='paris';
-------------------------------D2----------------------------------
-- OUI, la modification à ravers la vue 'v-pilote' est possible, pour
--  révoquer cette possibilité, il faut ajouter la clause 'whit read only'
--  à la fin de déclaration de la vue.
-------------------------------D3----------------------------------
create or replace view dervol as select avion,max(date_vol) from affectation group by avion;
-------------------------------D4----------------------------------
create or replace view cr_pilote as select * from pilote where
    (ville='paris' and comm is not null)
    or (ville <>'paris' and comm is null)
with check option;
--verification: la requete si apres ne sera pas executer correctement(ORA-01402) 
insert into cr_pilote values('3','aaa','paris',100,null,sysdate);
-------------------------------D5----------------------------------
create or replace view nomcomm as select * from pilote where 
    (nopilot not in (select pilote from affectation) and comm is null)
    or (nopilot in (select pilote from affectation) and comm is not null)
with check option;