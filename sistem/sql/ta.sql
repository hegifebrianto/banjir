/*==============================================================*/
/* Table: user                                                */
/*==============================================================*/
UPDATE  surabaya set nama_kecamatan = 'benowo' where gid=1;
UPDATE  surabaya set nama_kecamatan = 'pakal' where gid=2;
UPDATE  surabaya set nama_kecamatan = 'sambikerep' where gid=3;
UPDATE  surabaya set nama_kecamatan = 'lakar santri' where gid=4;
UPDATE  surabaya set nama_kecamatan = 'asem rowo' where gid=5;
UPDATE  surabaya set nama_kecamatan = 'tandes' where gid=6;
UPDATE  surabaya set nama_kecamatan = 'krembangan' where gid=7;
UPDATE  surabaya set nama_kecamatan = 'sukomanunggal' where gid=8;
UPDATE  surabaya set nama_kecamatan = 'dukuh pakis' where gid=9;
UPDATE  surabaya set nama_kecamatan = 'wiyung' where gid=10;
UPDATE  surabaya set nama_kecamatan = 'pabean cantikan' where gid=11;
UPDATE  surabaya set nama_kecamatan = 'semampir' where gid=12;
UPDATE  surabaya set nama_kecamatan = 'kenjeran' where gid=13;
UPDATE  surabaya set nama_kecamatan = 'bubutan' where gid=14;
UPDATE  surabaya set nama_kecamatan = 'sawahan' where gid=15;
UPDATE  surabaya set nama_kecamatan = 'simokerto' where gid=16;
UPDATE  surabaya set nama_kecamatan = 'genteng' where gid=17;
UPDATE  surabaya set nama_kecamatan = 'tambak sari' where gid=18;
UPDATE  surabaya set nama_kecamatan = 'bulak' where gid=19;
UPDATE  surabaya set nama_kecamatan = 'tegal sari' where gid=20;
UPDATE  surabaya set nama_kecamatan = 'wonokromo' where gid=21;
UPDATE  surabaya set nama_kecamatan = 'gubeng' where gid=22;
UPDATE  surabaya set nama_kecamatan = 'karang pilang' where gid=23;
UPDATE  surabaya set nama_kecamatan = 'jambangan' where gid=24;
UPDATE  surabaya set nama_kecamatan = 'gayungan' where gid=25;
UPDATE  surabaya set nama_kecamatan = 'wonocolo' where gid=26;
UPDATE  surabaya set nama_kecamatan = 'trenggilis mejoyo' where gid=27;
UPDATE  surabaya set nama_kecamatan = 'mulyorejo' where gid=28;
UPDATE  surabaya set nama_kecamatan = 'sukolilo' where gid=29;
UPDATE  surabaya set nama_kecamatan = 'rungkut' where gid=30;
UPDATE  surabaya set nama_kecamatan = 'gunung anyar' where gid=31;




CREATE TABLE user
(
    id_user serial primary key,
    username        VARCHAR(30) not null,
    password        text,
    role_user		VARCHAR(20) not null
);
insert into user_role(username,password,role_user) values('admin',md5('admin'),'1');
insert into user_role(username,password,role_user) values('hegi',md5('12345'),'2');


CREATE TABLE kecamatan
(
	id_kecamatan serial primary key,
	gid integer not null,
	nama_kecamatan VARCHAR(20) not null,
	foreign key(gid) references surabaya(gid),
	
);
insert into kecamatan(gid,nama_kecamatan) values
(1,'benowo'),
(2,'pakal'),
(3,'sambikerep'),
(4,'lakar santri'),
(5,'asem rowo'),
(6,'tandes'),
(7,'krembangan'),
(8,'sukomanunggal'),
(9,'dukuh pakis'),
(10,'wiyung'),
(11,'pabean cantikan'),
(12,'semampir'),
(13,'kenjeran'),
(14,'bubutan'),
(15,'sawahan'),
(16,'simokerto'),
(17,'genteng'),
(18,'tambak sari'),
(19,'bulak'),
(20,'tegal sari'),
(21,'wonokromo'),
(22,'gubeng'),
(23,'karang pilang'),
(24,'jambangan'),
(25,'gayungan'),
(26,'wonocolo'),
(27,'trenggilis mejoyo'),
(28,'mulyorejo'),
(29,'sukolilo'),
(30,'rungkut'),
(31,'gunung anyar');


CREATE TABLE banjir_tercatat
(
	gid integer not null,
	id_banjir serial primary key,
	lokasi VARCHAR(20) not null,
	keterangan_banjir text not null,
	foreign key(gid) references surabaya(gid) 
);	
insert into banjir_tercatat(gid,lokasi,keterangan_banjir) values 
(1,'','banjir di benowo'),
(1,'','banjir di benowo'),
(1,'','banjir di benowo'),
(1,'','banjir di benowo'),
(1,'','banjir di benowo'),
(1,'','banjir di benowo'),
(1,'','banjir di benowo'),
(1,'','banjir di benowo'),
(1,'','banjir di benowo'),
(1,'','banjir di benowo'),
(1,'','banjir di benowo'),
(1,'','banjir di benowo'),

(2,'','banjir di pakal'),
(2,'','banjir di pakal'),
(2,'','banjir di pakal'),
(2,'','banjir di pakal'),
(2,'','banjir di pakal'),
(2,'','banjir di pakal'),
(2,'','banjir di pakal'),
(2,'','banjir di pakal'),
(2,'','banjir di pakal'),
(2,'','banjir di pakal'),
(2,'','banjir di pakal'),
(2,'','banjir di pakal'),
(2,'','banjir di pakal'),

(3,'','banjir di sambikerep'),
(3,'','banjir di sambikerep'),
(3,'','banjir di sambikerep'),
(3,'','banjir di sambikerep'),
(3,'','banjir di sambikerep'),
(3,'','banjir di sambikerep'),
(3,'','banjir di sambikerep'),
(3,'','banjir di sambikerep'),
(3,'','banjir di sambikerep'),
(4,'','banjir di lakarsantri'),
(4,'','banjir di lakarsantri'),
(4,'','banjir di lakarsantri'),
(4,'','banjir di lakarsantri'),
(4,'','banjir di lakarsantri'),
(4,'','banjir di lakarsantri'),
(4,'','banjir di lakarsantri'),
(4,'','banjir di lakarsantri'),
(5,'','banjir di asemrowo'),
(5,'','banjir di asemrowo'),
(5,'','banjir di asemrowo'),
(5,'','banjir di asemrowo'),
(6,'','banjir di tandes'),
(6,'','banjir di tandes'),
(6,'','banjir di tandes'),
(6,'','banjir di tandes'),
(6,'','banjir di tandes'),
(7,'','banjir di krembangan'),
(7,'','banjir di krembangan'),
(7,'','banjir di krembangan'),
(7,'','banjir di krembangan'),
(7,'','banjir di krembangan'),
(8,'','banjir di sukomanunggal'),
(8,'','banjir di sukomanunggal'),
(8,'','banjir di sukomanunggal'),
(8,'','banjir di sukomanunggal'),
(8,'','banjir di sukomanunggal'),

(9,'','banjir di dukuh pakis'),

(10,'','banjir di wiyung'),
(10,'','banjir di wiyung'),

(11,'','banjir di pabean cantikan'),
(11,'','banjir di pabean cantikan'),
(11,'','banjir di pabean cantikan'),
(11,'','banjir di pabean cantikan'),
(11,'','banjir di pabean cantikan'),
(11,'','banjir di pabean cantikan'),
(11,'','banjir di pabean cantikan'),


(12,'','banjir di semampir'),
(12,'','banjir di semampir'),
(12,'','banjir di semampir'),
(12,'','banjir di semampir'),
(12,'','banjir di semampir'),
(12,'','banjir di semampir'),
(12,'','banjir di semampir'),
(12,'','banjir di semampir'),

(13,'','banjir di kenjeran'),
(13,'','banjir di kenjeran'),
(13,'','banjir di kenjeran'),
(13,'','banjir di kenjeran'),
(13,'','banjir di kenjeran'),

(14,'','banjir di bubutan'),
(14,'','banjir di bubutan'),
(14,'','banjir di bubutan'),
(14,'','banjir di bubutan'),
(14,'','banjir di bubutan'),
(14,'','banjir di bubutan'),
(14,'','banjir di bubutan'),

(15,'','banjir di sawahan'),
(15,'','banjir di sawahan'),
(15,'','banjir di sawahan'),

(16,'','banjir di simokerto'),
(16,'','banjir di simokerto'),
(16,'','banjir di simokerto'),
(16,'','banjir di simokerto'),
(16,'','banjir di simokerto'),
(16,'','banjir di simokerto'),
(16,'','banjir di simokerto'),
(16,'','banjir di simokerto'),

(17,'','banjir di genteng'),

(18,'','banjir di tambak sari'),

(19,'','banjir di bulak'),
(19,'','banjir di bulak'),
(19,'','banjir di bulak'),
(19,'','banjir di bulak'),
(19,'','banjir di bulak'),

(20,'','banjir di tegal sari'),
(20,'','banjir di tegal sari'),
(20,'','banjir di tegal sari'),

(21,'','banjir di wonokromo'),
(21,'','banjir di wonokromo'),
(21,'','banjir di wonokromo'),
(21,'','banjir di wonokromo'),
(21,'','banjir di wonokromo'),

(22,'','banjir di gubeng'),
(22,'','banjir di gubeng'),

(23,'','banjir di karang pilang'),
(23,'','banjir di karang pilang'),
(23,'','banjir di karang pilang'),
(23,'','banjir di karang pilang'),
(23,'','banjir di karang pilang'),

(24,'','banjir di jambangan'),

(25,'','banjir di gayungan'),
(25,'','banjir di gayungan'),
(25,'','banjir di gayungan'),
(25,'','banjir di gayungan'),

(26,'','banjir di wonocolo'),
(26,'','banjir di wonocolo'),
(26,'','banjir di wonocolo'),
(26,'','banjir di wonocolo'),
(26,'','banjir di wonocolo'),
(26,'','banjir di wonocolo'),
(26,'','banjir di wonocolo'),
(26,'','banjir di wonocolo'),

(27,'','banjir di trenggilis mejoyo'),
(28,'','banjir di mulyorejo'),
(28,'','banjir di mulyorejo'),
(28,'','banjir di mulyorejo'),


(29,'','banjir di sukolilo'),
(29,'','banjir di sukolilo'),
(29,'','banjir di sukolilo'),
(29,'','banjir di sukolilo'),
(29,'','banjir di sukolilo'),
(29,'','banjir di sukolilo'),
(29,'','banjir di sukolilo'),
(29,'','banjir di sukolilo'),
(29,'','banjir di sukolilo'),
(29,'','banjir di sukolilo'),
(29,'','banjir di sukolilo'),

(30,'','banjir di rungkut'),
(30,'','banjir di rungkut'),

(31,'','banjir di gunung anyar'),
(31,'','banjir di gunung anyar'),
(31,'','banjir di gunung anyar'),
(31,'','banjir di gunung anyar'),
(31,'','banjir di gunung anyar')
;




CREATE TABLE curah_hujan
(
	gid integer not null,
	id_curahhujan serial primary key,
	nilai_curahhujan VARCHAR(20),
	waktu date not null,
	foreign key(gid) references surabaya(gid)
);
insert into curah_hujan(gid,nilai_curahhujan,waktu) values 
(1,'334','2015-01-01'),
(1,'351','2015-02-01'),
(1,'278','2015-03-01'),
(1,'284','2015-04-01'),
(1,'123','2015-05-01'),
(1,'167','2015-06-01'),
(1,'4','2015-07-01'),
(1,'0','2015-08-01'),
(1,'0','2015-09-01'),
(1,'0','2015-10-01'),
(1,'89','2015-11-01'),
(1,'203','2015-12-01'),
(2,'334','2015-01-01'),
(2,'351','2015-02-01'),
(2,'278','2015-03-01'),
(2,'284','2015-04-01'),
(2,'123','2015-05-01'),
(2,'167','2015-06-01'),
(2,'4','2015-07-01'),
(2,'0','2015-08-01'),
(2,'0','2015-09-01'),
(2,'0','2015-10-01'),
(2,'89','2015-11-01'),
(2,'203','2015-12-01'),
(3,'438','2015-01-01'),
(3,'440','2015-02-01'),
(3,'335','2015-03-01'),
(3,'334','2015-04-01'),
(3,'0','2015-05-01'),
(3,'0','2015-06-01'),
(3,'0','2015-07-01'),
(3,'0','2015-08-01'),
(3,'0','2015-09-01'),
(3,'0','2015-10-01'),
(3,'150','2015-11-01'),
(3,'376','2015-12-01'),
(4,'280','2015-01-01'),
(4,'446','2015-02-01'),
(4,'344','2015-03-01'),
(4,'291','2015-04-01'),
(4,'53','2015-05-01'),
(4,'133','2015-06-01'),
(4,'54','2015-07-01'),
(4,'0','2015-08-01'),
(4,'0','2015-09-01'),
(4,'0','2015-10-01'),
(4,'62','2015-11-01'),
(4,'395','2015-12-01'),
(5,'438','2015-01-01'),
(5,'440','2015-02-01'),
(5,'335','2015-03-01'),
(5,'334','2015-04-01'),
(5,'0','2015-05-01'),
(5,'0','2015-06-01'),
(5,'0','2015-07-01'),
(5,'0','2015-08-01'),
(5,'0','2015-09-01'),
(5,'0','2015-10-01'),
(5,'150','2015-11-01'),
(5,'376','2015-12-01'),
(6,'438','2015-01-01'),
(6,'440','2015-02-01'),
(6,'335','2015-03-01'),
(6,'334','2015-04-01'),
(6,'0','2015-05-01'),
(6,'0','2015-06-01'),
(6,'0','2015-07-01'),
(6,'0','2015-08-01'),
(6,'0','2015-09-01'),
(6,'0','2015-10-01'),
(6,'150','2015-11-01'),
(6,'376','2015-12-01'),
(7,'503','2015-01-01'),
(7,'330','2015-02-01'),
(7,'290','2015-03-01'),
(7,'168','2015-04-01'),
(7,'50','2015-05-01'),
(7,'68','2015-06-01'),
(7,'5','2015-07-01'),
(7,'0','2015-08-01'),
(7,'0','2015-09-01'),
(7,'8','2015-10-01'),
(7,'70','2015-11-01'),
(7,'337','2015-12-01'),


(8,'227','2015-01-01'),
(8,'427','2015-02-01'),
(8,'386','2015-03-01'),
(8,'215','2015-04-01'),
(8,'100','2015-05-01'),
(8,'85','2015-06-01'),
(8,'17','2015-07-01'),
(8,'0','2015-08-01'),
(8,'0','2015-09-01'),
(8,'0','2015-10-01'),
(8,'81','2015-11-01'),
(8,'443','2015-12-01'),

(9,'280','2015-01-01'),
(9,'446','2015-02-01'),
(9,'344','2015-03-01'),
(9,'291','2015-04-01'),
(9,'53','2015-05-01'),
(9,'133','2015-06-01'),
(9,'54','2015-07-01'),
(9,'0','2015-08-01'),
(9,'0','2015-09-01'),
(9,'0','2015-10-01'),
(9,'62','2015-11-01'),
(9,'395','2015-12-01'),

(10,'280','2015-01-01'),
(10,'446','2015-02-01'),
(10,'344','2015-03-01'),
(10,'291','2015-04-01'),
(10,'53','2015-05-01'),
(10,'133','2015-06-01'),
(10,'54','2015-07-01'),
(10,'0','2015-08-01'),
(10,'0','2015-09-01'),
(10,'0','2015-10-01'),
(10,'62','2015-11-01'),
(10,'395','2015-12-01'),

(11,'503','2015-01-01'),
(11,'330','2015-02-01'),
(11,'290','2015-03-01'),
(11,'168','2015-04-01'),
(11,'50','2015-05-01'),
(11,'68','2015-06-01'),
(11,'5','2015-07-01'),
(11,'0','2015-08-01'),
(11,'0','2015-09-01'),
(11,'8','2015-10-01'),
(11,'70','2015-11-01'),
(11,'337','2015-12-01'),
(12,'503','2015-01-01'),
(12,'330','2015-02-01'),
(12,'290','2015-03-01'),
(12,'168','2015-04-01'),
(12,'50','2015-05-01'),
(12,'68','2015-06-01'),
(12,'5','2015-07-01'),
(12,'0','2015-08-01'),
(12,'0','2015-09-01'),
(12,'8','2015-10-01'),
(12,'70','2015-11-01'),
(12,'337','2015-12-01'),

(13,'324','2015-01-01'),
(13,'425','2015-02-01'),
(13,'333','2015-03-01'),
(13,'179','2015-04-01'),
(13,'120','2015-05-01'),
(13,'108','2015-06-01'),
(13,'2','2015-07-01'),
(13,'0','2015-08-01'),
(13,'0','2015-09-01'),
(13,'0','2015-10-01'),
(13,'92','2015-11-01'),
(13,'426','2015-12-01'),

(14,'227','2015-01-01'),
(14,'427','2015-02-01'),
(14,'386','2015-03-01'),
(14,'215','2015-04-01'),
(14,'100','2015-05-01'),
(14,'85','2015-06-01'),
(14,'17','2015-07-01'),
(14,'0','2015-08-01'),
(14,'0','2015-09-01'),
(14,'0','2015-10-01'),
(14,'81','2015-11-01'),
(14,'443','2015-12-01'),

(15,'227','2015-01-01'),
(15,'427','2015-02-01'),
(15,'386','2015-03-01'),
(15,'215','2015-04-01'),
(15,'100','2015-05-01'),
(15,'85','2015-06-01'),
(15,'17','2015-07-01'),
(15,'0','2015-08-01'),
(15,'0','2015-09-01'),
(15,'0','2015-10-01'),
(15,'81','2015-11-01'),
(15,'443','2015-12-01'),

(16,'227','2015-01-01'),
(16,'427','2015-02-01'),
(16,'386','2015-03-01'),
(16,'215','2015-04-01'),
(16,'100','2015-05-01'),
(16,'85','2015-06-01'),
(16,'17','2015-07-01'),
(16,'0','2015-08-01'),
(16,'0','2015-09-01'),
(16,'0','2015-10-01'),
(16,'81','2015-11-01'),
(16,'443','2015-12-01'),

(17,'227','2015-01-01'),
(17,'427','2015-02-01'),
(17,'386','2015-03-01'),
(17,'215','2015-04-01'),
(17,'100','2015-05-01'),
(17,'85','2015-06-01'),
(17,'17','2015-07-01'),
(17,'0','2015-08-01'),
(17,'0','2015-09-01'),
(17,'0','2015-10-01'),
(17,'81','2015-11-01'),
(17,'443','2015-12-01'),

(18,'227','2015-01-01'),
(18,'427','2015-02-01'),
(18,'386','2015-03-01'),
(18,'215','2015-04-01'),
(18,'100','2015-05-01'),
(18,'85','2015-06-01'),
(18,'17','2015-07-01'),
(18,'0','2015-08-01'),
(18,'0','2015-09-01'),
(18,'0','2015-10-01'),
(18,'81','2015-11-01'),
(18,'443','2015-12-01'),

(19,'324','2015-01-01'),
(19,'425','2015-02-01'),
(19,'333','2015-03-01'),
(19,'179','2015-04-01'),
(19,'120','2015-05-01'),
(19,'108','2015-06-01'),
(19,'2','2015-07-01'),
(19,'0','2015-08-01'),
(19,'0','2015-09-01'),
(19,'0','2015-10-01'),
(19,'92','2015-11-01'),
(19,'426','2015-12-01'),

(20,'227','2015-01-01'),
(20,'427','2015-02-01'),
(20,'386','2015-03-01'),
(20,'215','2015-04-01'),
(20,'100','2015-05-01'),
(20,'85','2015-06-01'),
(20,'17','2015-07-01'),
(20,'0','2015-08-01'),
(20,'0','2015-09-01'),
(20,'0','2015-10-01'),
(20,'81','2015-11-01'),
(20,'443','2015-12-01'),

(21,'322','2015-01-01'),
(21,'428','2015-02-01'),
(21,'372','2015-03-01'),
(21,'238','2015-04-01'),
(21,'137','2015-05-01'),
(21,'154','2015-06-01'),
(21,'48','2015-07-01'),
(21,'0','2015-08-01'),
(21,'0','2015-09-01'),
(21,'0','2015-10-01'),
(21,'47','2015-11-01'),
(21,'450','2015-12-01'),

(22,'227','2015-01-01'),
(22,'427','2015-02-01'),
(22,'386','2015-03-01'),
(22,'215','2015-04-01'),
(22,'100','2015-05-01'),
(22,'85','2015-06-01'),
(22,'17','2015-07-01'),
(22,'0','2015-08-01'),
(22,'0','2015-09-01'),
(22,'0','2015-10-01'),
(22,'81','2015-11-01'),
(22,'443','2015-12-01'),

(23,'280','2015-01-01'),
(23,'446','2015-02-01'),
(23,'344','2015-03-01'),
(23,'291','2015-04-01'),
(23,'53','2015-05-01'),
(23,'133','2015-06-01'),
(23,'54','2015-07-01'),
(23,'0','2015-08-01'),
(23,'0','2015-09-01'),
(23,'0','2015-10-01'),
(23,'62','2015-11-01'),
(23,'395','2015-12-01'),

(24,'272','2015-01-01'),
(24,'506','2015-02-01'),
(24,'343','2015-03-01'),
(24,'358','2015-04-01'),
(24,'46','2015-05-01'),
(24,'45','2015-06-01'),
(24,'0','2015-07-01'),
(24,'0','2015-08-01'),
(24,'0','2015-09-01'),
(24,'0','2015-10-01'),
(24,'39','2015-11-01'),
(24,'413','2015-12-01'),

(25,'272','2015-01-01'),
(25,'506','2015-02-01'),
(25,'343','2015-03-01'),
(25,'358','2015-04-01'),
(25,'46','2015-05-01'),
(25,'45','2015-06-01'),
(25,'0','2015-07-01'),
(25,'0','2015-08-01'),
(25,'0','2015-09-01'),
(25,'0','2015-10-01'),
(25,'39','2015-11-01'),
(25,'413','2015-12-01'),

(26,'322','2015-01-01'),
(26,'428','2015-02-01'),
(26,'372','2015-03-01'),
(26,'238','2015-04-01'),
(26,'137','2015-05-01'),
(26,'154','2015-06-01'),
(26,'48','2015-07-01'),
(26,'0','2015-08-01'),
(26,'0','2015-09-01'),
(26,'0','2015-10-01'),
(26,'47','2015-11-01'),
(26,'450','2015-12-01'),

(27,'322','2015-01-01'),
(27,'428','2015-02-01'),
(27,'372','2015-03-01'),
(27,'238','2015-04-01'),
(27,'137','2015-05-01'),
(27,'154','2015-06-01'),
(27,'48','2015-07-01'),
(27,'0','2015-08-01'),
(27,'0','2015-09-01'),
(27,'0','2015-10-01'),
(27,'47','2015-11-01'),
(27,'450','2015-12-01'),

(28,'436','2015-01-01'),
(28,'605','2015-02-01'),
(28,'345','2015-03-01'),
(28,'236','2015-04-01'),
(28,'0','2015-05-01'),
(28,'0','2015-06-01'),
(28,'0','2015-07-01'),
(28,'0','2015-08-01'),
(28,'0','2015-09-01'),
(28,'0','2015-10-01'),
(28,'89','2015-11-01'),
(28,'443','2015-12-01'),

(29,'436','2015-01-01'),
(29,'605','2015-02-01'),
(29,'345','2015-03-01'),
(29,'236','2015-04-01'),
(29,'0','2015-05-01'),
(29,'0','2015-06-01'),
(29,'0','2015-07-01'),
(29,'0','2015-08-01'),
(29,'0','2015-09-01'),
(29,'0','2015-10-01'),
(29,'89','2015-11-01'),
(29,'443','2015-12-01'),

(30,'388','2015-01-01'),
(30,'690','2015-02-01'),
(30,'450','2015-03-01'),
(30,'268','2015-04-01'),
(30,'86','2015-05-01'),
(30,'195','2015-06-01'),
(30,'0','2015-07-01'),
(30,'0','2015-08-01'),
(30,'0','2015-09-01'),
(30,'0','2015-10-01'),
(30,'56','2015-11-01'),
(30,'389','2015-12-01'),
(31,'388','2015-01-01'),
(31,'690','2015-02-01'),
(31,'450','2015-03-01'),
(31,'268','2015-04-01'),
(31,'86','2015-05-01'),
(31,'195','2015-06-01'),
(31,'0','2015-07-01'),
(31,'0','2015-08-01'),
(31,'0','2015-09-01'),
(31,'0','2015-10-01'),
(31,'56','2015-11-01'),
(31,'389','2015-12-01')
;


CREATE TABLE taman_drainase
(
	gid integer not null,
	id_tamandrainase serial primary key,
	nama_tamandrainase text not null,
	lokasi VARCHAR(20) not null,
	foreign key(gid) references surabaya(gid)
);	
insert into taman_drainase(gid,nama_tamandrainase,lokasi) values
(1,'taman drainase di benowo',''),
(2,'taman drainase di pakal',''),
(3,'taman drainase di sambikerep',''),
(3,'taman drainase di sambikerep',''),
(4,'taman drainase di lakarsantri',''),
(5,'taman drainase di asemrowo',''),
(6,'taman drainase di tandes',''),
(7,'taman drainase di krembangan',''),
(8,'taman drainase di sukomanunggal',''),
(8,'taman drainase di sukomanunggal',''),
(9,'taman drainase di dukuh pakis',''),
(10,'taman drainase di wiyung',''),
(11,'taman drainase di pabean cantikan',''),
(11,'taman drainase di pabean cantikan',''),
(12,'taman drainase di semampir',''),
(13,'taman drainase di kenjeran',''),
(13,'taman drainase di kenjeran',''),
(13,'taman drainase di kenjeran',''),
(14,'taman drainase di bubutan',''),
(15,'taman drainase di sawahan',''),
(16,'taman drainase di simokerto',''),
(17,'taman drainase di gengeng',''),
(17,'taman drainase di gengeng',''),
(17,'taman drainase di gengeng',''),
(18,'taman drainase di tambaksari',''),
(17,'taman drainase di gengeng',''),
(19,'taman drainase di bulak',''),
(19,'taman drainase di bulak',''),
(19,'taman drainase di bulak',''),
(20,'taman drainase di tegal sari',''),
(20,'taman drainase di tegal sari',''),
(20,'taman drainase di tegal sari',''),
(21,'taman drainase di wonokromo',''),
(21,'taman drainase di wonokromo',''),
(21,'taman drainase di wonokromo',''),
(21,'taman drainase di wonokromo',''),
(22,'taman drainase di gubeng',''),
(23,'taman drainase di karangpilang',''),
(24,'taman drainase di jambangan',''),
(24,'taman drainase di jambangan',''),
(25,'taman drainase di gayungan',''),
(25,'taman drainase di gayungan',''),
(26,'taman drainase di wonocolo',''),
(26,'taman drainase di wonocolo',''),
(26,'taman drainase di wonocolo',''),
(27,'taman drainase di trenggilismejoyo',''),
(28,'taman drainase di mulyorejo',''),
(28,'taman drainase di mulyorejo',''),
(28,'taman drainase di mulyorejo',''),
(28,'taman drainase di mulyorejo',''),
(28,'taman drainase di mulyorejo',''),
(28,'taman drainase di mulyorejo',''),
(28,'taman drainase di mulyorejo',''),

(29,'taman drainase di sukolilo',''),
(29,'taman drainase di sukolilo',''),
(29,'taman drainase di sukolilo',''),
(29,'taman drainase di sukolilo',''),
(29,'taman drainase di sukolilo',''),
(29,'taman drainase di sukolilo',''),
(29,'taman drainase di sukolilo',''),
(29,'taman drainase di sukolilo',''),
(29,'taman drainase di sukolilo',''),
(29,'taman drainase di sukolilo',''),

(30,'taman drainase di rungkut',''),
(30,'taman drainase di rungkut',''),
(30,'taman drainase di rungkut',''),
(30,'taman drainase di rungkut',''),
(30,'taman drainase di rungkut',''),
(30,'taman drainase di rungkut',''),
(30,'taman drainase di rungkut',''),
(30,'taman drainase di rungkut',''),

(31,'taman drainase di gunung anyar','')
;


CREATE TABLE banyak_penduduk
(
	gid integer not null,
	id_banyakpenduduk serial primary key,
	jumlah_penduduk VARCHAR(20) not null

);	
insert into banyak_penduduk(gid, jumlah_penduduk) values
(1,'54133'),
(2,'47404'),
(3,'54133'),
(4,'51195'),
(5,'42704'),
(6,'103084'),
(7,'106664'),
(8,'100612'),
(9,'64249'),
(10,'67987'),
(11,'69423'),
(12,'151429'),
(13,'163438'),
(14,'84465'),
(15,'170605'),
(16,'79319'),
(17,'46548'),
(18,'204805'),
(19,'37214'),
(20,'85606'),
(21,'133211'),
(22,'128127'),
(23,'72469'),
(24,'46430'),
(25,'42717'),
(26,'80276'),
(27,'72467'),
(28,'94728'),
(29,'119873'),
(30,'121084'),
(31,'62120')
;

CREATE TABLE kriteria
(
	id_kriteria serial primary key,
	nama_kriteria VARCHAR(20) not null
);
insert into kriteria(id_kriteria,nama_kriteria) values
('curah_hujan'),
('banjir_tercatat'),
('taman_drainase'),
('banyak_penduduk');

CREATE TABLE skema_perbandingan
(
	id_skema serial primary key,
	nilai VARCHAR(20) not null,
	keterangan text not null
);
insert into skema_perbandingan(nilai,keterangan) values
('1', 'Kedua elemen sama pentingnya'),
('3', 'Elemen yang satu sedikit lebih penting daripada elemen yang lainnya'),
('5', 'Elemen yang satu lebih penting daripada yang lainnya'),
('7', 'Satu elemen jelas lebih mutlak penting daripada elemen lainnya'),
('9', 'Satu elemen mutlak penting daripada elemen lainnya '),
('2', 'Nilai-nilai antara dua nilai pertimbangan-pertimbangan  yang berdekatan'),
('4', 'Nilai-nilai antara dua nilai pertimbangan-pertimbangan  yang berdekatan'),
('6', 'Nilai-nilai antara dua nilai pertimbangan-pertimbangan  yang berdekatan'),
('8', 'Nilai-nilai antara dua nilai pertimbangan-pertimbangan  yang berdekatan');

CREATE TABLE IF NOT EXISTS logahp (
  idhitung integer references loghitung(idhitung),
  gid integer references surabaya(gid),
  nama_kecamatan text,
  curah_hujan numeric,
  banjir_tercatat numeric,
  taman_drainase numeric,
  banyak_penduduk numeric,
  val_ahp decimal NOT NULL
);

CREATE TABLE IF NOT EXISTS logbobot (
  idhitung integer references loghitung(idhitung),
  valbobot decimal 
);

CREATE TABLE IF NOT EXISTS loghitung (
  idhitung serial primary key,
  datehitung timestamp with time zone,
  ci decimal ,
  cr decimal 
);


CREATE TABLE IF NOT EXISTS skema_perbandingan (
  id_skema  serial primary key,
  nilai integer,
  keterangan varchar(100),
  PRIMARY KEY (id_skema)
) ;

--
-- Dumping data for table `skema_perbandingan`
--

INSERT INTO skema_perbandingan (nilai, keterangan) VALUES
( 1, 'Kedua elemen sama pentingnya'),
( 3, 'Elemen yang satu sedikit lebih penting daripada elemen yang lainnya'),
( 5, 'Elemen yang satu lebih penting daripada yang lainnya'),
( 7, 'Satu elemen jelas lebih mutlak penting daripada elemen lainnya'),
( 9, 'Satu elemen mutlak penting daripada elemen lainnya '),
( 2, 'Nilai-nilai antara dua nilai pertimbangan-pertimbangan  yang berdekatan'),
( 4, 'Nilai-nilai antara dua nilai pertimbangan-pertimbangan  yang berdekatan'),
( 6, 'Nilai-nilai antara dua nilai pertimbangan-pertimbangan  yang berdekatan'),
( 8, 'Nilai-nilai antara dua nilai pertimbangan-pertimbangan  yang berdekatan');

-- --------------------------------------------------------

