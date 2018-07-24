SELECT loc.name, s.name, l.name FROM locka.tbl_locker as l, locka.tbl_locker_location as loc, locka.tbl_locker_size as s
where l.Location_ID = loc.location_id and l.locker_size_id = s.locker_size_id;