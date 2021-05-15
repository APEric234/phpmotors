-- create tony stark
insert into clients (clients.clientEmail,clients.clientFirstname,
                     clients.clientLastname,clients.clientPassword,
                     clients.comment)
values ("tony@starkent.com","Tony","Stark","Iam1ronM@n","I am the real Ironman")
-- update tony stark
update clients set clients.clientLevel='3' where clients.clientFirstname="Tony" and clients.clientLastname="Stark"
-- update hummer to say spacious
update `inventory` set invDescription=REPLACE(invDescription,"small","spacious") WHERE invMake="GM" and invModel="Hummer" limit 1;

-- get all models of suvs
select inventory.invModel,carclassification.classificationName from inventory 
inner join carclassification using(classificationId)
where carclassification.classificationName="SUV"
-- delete jeep wrangler
DELETE from inventory where inventory.invMake="Jeep" and inventory.invModel="Wrangler";
-- update image paths
update `inventory` set invImage=REPLACE(invImage,"/images","/phpmotors/images"),
 invThumbnail=REPLACE(invThumbnail,"/images","/phpmotors/images")
