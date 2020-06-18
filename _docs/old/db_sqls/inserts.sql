-- Insert TB_LEAGUES --
INSERT INTO `tb_leagues` 
(`desname`, `desinitials`, `desregion`, `nrdivision`, `desimage`) VALUES
-- 1 CBLoL - Brasil -- 
('Campeonato Brasileiro de LoL', 'CBLOL', 'Brasil', 3, 'cblol.png'),

-- 2 LCK - Korea -- 
('LoL Champions Korea', 'LCK', 'Korea', 2, 'lck.png'),

-- 3 LCS - North America -- 
('LoL Championship Series', 'LCS', 'North America', 3, 'lcs.png'),

-- 4 LEC - Europe -- 
('LoL Europan Championship', 'LEC', 'Europe', 3, 'lec.png'),

-- 5 LJL - Japan -- 
('LoL Japan League', 'LJL', 'Japan', 3, 'ljl.png'),

-- 6 LLA - Latin America -- 
('LoL Movistar Latinoamérica', 'LPL', 'Latin America', 4, 'lpl.png'),

-- 7 LMS - Taiwan, Hk, Macau -- 
('LoL Master Series', 'LMS', 'Taiwan, HK, Macau', 3, 'lms.png'),

-- 8 LPL - China -- 
('LoL Pro League', 'LPL', 'China', 4, 'lpl.png'),

-- 9 OPL - Oceania -- 
('Oceanic Pro League', 'OPL', 'Oceania', 2, 'opl.png'),

-- 10 TCL - Turkey -- 
('Turkish Champions League', 'TCL', 'Turkey', 2, 'vcs.png')
-- ?? ??? - ?? -- 
-- ('', '', '', 1, .png'),
;
--
--
--
-- Insert TB_DIVISIONS --
INSERT INTO `tb_divisions` 
(`iddivision`, `idleague`, `desdname`) VALUES 
--
-- CBLOL --
(1, '1', '1ª Divisão'), 
(2, '1', '2ª Divisão'), 
(3, '1', '3ª Divisão'), 
--
-- LCK --
(4, '2', '1ª Divisão'), 
(5, '2', '2ª Divisão'), 
--
-- LCS --
(6, '3', '3ª Divisão'), 
(7, '3', '1ª Divisão'), 
(8, '3', '2ª Divisão'), 
--
-- LEC --
(9, '4', '1ª Divisão'), 
(10, '4', '2ª Divisão'), 
(11, '4', '3ª Divisão'), 
--
-- LJL --
(12, '5', '1ª Divisão'), 
(13, '5', '2ª Divisão'), 
(14, '5', '3ª Divisão'), 
--
-- LLA --
(15, '6', '1ª Divisão'), 
(16, '6', '2ª Divisão'), 
(17, '6', '3ª Divisão'), 
(18, '6', '4ª Divisão'), 
--
-- LMS --
(19, '7', '1ª Divisão'), 
(20, '7', '2ª Divisão'), 
(21, '7', '3ª Divisão'), 
--
-- LPL --
(22, '8', '1ª Divisão'), 
(23, '8', '2ª Divisão'), 
(24, '8', '3ª Divisão'), 
(25, '8', '4ª Divisão'), 
--
-- OPL --
(26, '9', '1ª Divisão'), 
(27, '9', '2ª Divisão'), 
--
-- TCL --
(28, '10', '1ª Divisão'), 
(29, '10', '2ª Divisão') 
--
--
;
--
--
--
-- Insert TB_TEAMS
INSERT INTO `tb_teams` 
(`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) VALUES
--
-- CBLOL 1ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
(1, 1, 'CNB e-Sports Club', 'CNB', 'cblol_cnb.png'),
(1, 1, 'Flamengo eSports', 'FLA', 'cblol_fla.png'),
(1, 1, 'INTZ e-Sports Club', 'ITZ', 'cblol_itz.png'),
(1, 1, 'KaBuM! e-Sports', 'KBM', 'cblol_kbm.png'),
(1, 1, 'paiN Gaming', 'PNG', 'cblol_png.png'),
(1, 1, 'ProGaming Esports', 'PRG', 'cblol_prg.png'),
(1, 1, 'Redemption eSports', 'RDP', 'cblol_rdp.png'),
(1, 1, 'RED Canids', 'RED', 'cblol_red.png'),
(1, 1, 'Uppercurt Esports', 'UP', 'cblol_up.png'),
(1, 1, 'Vivo Keyd', 'VK', 'cblol_vk.png'),
-- CBLOL 2ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
(1, 2, 'Falkol', 'FKL', 'cblol_fkl.png'),
(1, 2, 'Havan Liberty Gaming', 'HLG', 'cblol_hlg.png'),
(1, 2, 'Operation Kino', 'OPK', 'cblol_opk.png'),
(1, 2, 'Team One eSports', 'ONE', 'cblol_one.png'),
(1, 2, 'Submarino Stars', 'SUB', 'cblol_sub.png'),
(1, 2, 'T Show', 'TS', 'cblol_ts.png'),
(1, 2, 'Iron Hawks e-Sports', 'IHS', 'cblol_ihs.png'),
(1, 2, 'Santos e-Sports', 'SAN', 'cblol_san.png'),
(1, 2, 'Brave e-Sports', 'BRA', 'cblol_bra.png'),
(1, 2, 'WP Gaming', 'WP', 'cblol_wp.png'),
-- CBLOL 3ª divisao
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
(1, 3, '5Fox E-Sports Club', 'FOX', 'cblol_fox.png'),
(1, 3, '2Kill Gaming', '2K', 'cblol_2k.png'),
(1, 3, 'Stay Gaming', 'STG', 'cblol_stg.png'),
(1, 3, 'Sons of Tzu Gaming', 'SOT', 'cblol_sot.png'),
(1, 3, 'e-Champ Gaming', 'CG', 'cblol_cg.png'),
(1, 3, 'Team Genesis', 'GEN', 'cblol_gen.png'),
(1, 3, 'Overload', 'OVL', 'cblol_OVL.png'),
(1, 3, 'Big Gods', 'BIG', 'cblol_big.png'),
(1, 3, 'Dexterity Team', 'DEX', 'cblol_dex.png'),
(1, 3, 'JAYOB e-Sports', 'JAY', 'cblol_jay.png'),
-- CBLOL sem divisao
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
(1, NULL, 'CNB Trinity White', 'CTW', 'cblol_CTW.png'),
(1, NULL, 'IMP e-Sports', 'IMP', 'cblol_imp.png'),
(1, NULL, 'Team awp', 'AWP', 'cblol_awp.png'),
(1, NULL, 'Team United', 'UNI', 'cblol_uni.png'),
(1, NULL, 'g3nerationX', 'G3X', 'cblol_g3x.png'),
(1, NULL, 'vTi Ignis', 'VTI', 'cblol_vti.png'),
(1, NULL, 'Insight eSports', 'EXP', 'cblol_exp.png'),
(1, NULL, 'RMA e-Sports', 'RMA', 'cblol_rma.png'),
(1, NULL, 'Merciless Gaming', 'MGG', 'cblol_mgg.png'),
(1, NULL, 'Robot E-Sports Team', 'BOT', 'cblol_bot.png'),
--
-- 
-- LCK 1ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
(2, 4, 'Afreeca Freecs', 'AF', 'lck_af.png'),
(2, 4, 'DAMWON Gaming', 'DWG', 'lck_dwg.png'),
(2, 4, 'Gen.G Esports', 'GEN', 'lck_gen.png'),
(2, 4, 'Griffin', 'GRF', 'lck_grf.png'),
(2, 4, 'Hanwha Life Esports', 'HLE', 'lck_hle.png'),
(2, 4, 'Jin Air GreenWings', 'JAG', 'lck_jag.png'),
(2, 4, 'KING-ZONE DragonX', 'KZ', 'lck_kz.png'),
(2, 4, 'KT Rolster', 'KT', 'lck_kt.png'),
(2, 4, 'SANDBOX Gaming', 'SB', 'lck_sb.png'),
(2, 4, 'SK Telecom T1', 'SKT', 'lck_skt.png'),
-- LCK 2ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
(2, 5, 'KSV eSports', 'KSV', 'lck_ksv.png'),
(2, 5, 'ROX Tigers', 'ROX', 'lck_rox.png'),
(2, 5, 'bbq Olivers', 'BBQ', 'lck_BBQ.png'),
(2, 5, 'MVP', 'MVP', 'lck_mvp.png'),
(2, 5, 'Kongdoo Monster', 'KDM', 'lck_kdm.png'),
(2, 5, 'Ever8 Winners', 'E8W', 'lck_e8w.png'),
(2, 5, 'CJ Entus', 'CJ', 'lck_cj.png'),
(2, 5, 'ESC Ever', 'EER', 'lck_ever.png'),
(2, 5, 'SBENU Korea', 'SBK', 'lck_sbk.png'),
(2, 5, 'Samsung Galaxy', 'SSG', 'lck_ssg.png'),
-- LCK sem divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
(2, NULL, 'Longzhu Gaming', 'LZ', 'lck_lz.png'),
(2, NULL, 'Incredible Miracle', 'IM', 'lck_im.png'),
(2, NULL, 'Dark Wolves', 'DKW', 'lck_dkw.png'),
(2, NULL, 'SBENU Sonicboom', 'SBS', 'lck_sbs.png'),
(2, NULL, 'NaJin e-mFire', 'NJE', 'lck_nje.png'), -- ---------------
(2, NULL, 'HUYA Tigers', 'HT', 'lck_ht.png'),
(2, NULL, 'Prime Clan', 'PRC', 'lck_prc.png'),
(2, NULL, 'Xenics Storm', 'XCS', 'lck_xcs.png'),
(2, NULL, 'Rebels Anarchy', 'RBA', 'lck_rba.png'),
(2, NULL, 'Winners', 'WNS', 'lck_wns.png'),
--
--
-- LCS 1ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
(3, 6, '100 Thieves', '100', 'lcs_100.png'),
(3, 6, 'Cloud9', 'C9', 'lcs_c9.png'),
(3, 6, 'Clutch Gaming', 'CG', 'lcs_cg.png'),
(3, 6, 'Counter Logic Gaming', 'CLG', 'lcs_clg.png'),
(3, 6, 'Echo Fox', 'FOX', 'lcs_fox.png'),
(3, 6, 'FlyQuest', 'FLY', 'lcs_fly.png'),
(3, 6, 'Golden Guardians', 'GGS', 'lcs_ggs.png'),
(3, 6, 'OpTic Gaming', 'OPT', 'lcs_opt.png'),
(3, 6, 'Team Liquid', 'TL', 'lcs_tl.png'),
(3, 6, 'Team SoloMid', 'TSM', 'lcs_tsm.png'),
-- LCS 2ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
(3, 7, '100 Thieves Academy', '100', 'lcs_100.png'),
(3, 7, 'Cloud9 Academy', 'C9', 'lcs_c9.png'),
(3, 7, 'Clutch Gaming Academy', 'CG', 'lcs_cg.png'),
(3, 7, 'Counter Logic Gaming Academy', 'CLG', 'lcs_clg.png'),
(3, 7, 'Echo Fox Academy', 'FOX', 'lcs_fox.png'),
(3, 7, 'FlyQuest Academy', 'FLY', 'lcs_fly.png'),
(3, 7, 'Golden Guardians Academy', 'GGS', 'lcs_ggs.png'),
(3, 7, 'OpTic Gaming Academy', 'OPT', 'lcs_opt.png'),
(3, 7, 'Team Liquid Academy', 'TL', 'lcs_tl.png'),
(3, 7, 'TSM Academy', 'TSM', 'lcs_tsm.png'),
-- LCS 3ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
(3, 8, 'Apex Pride', 'APP', 'lcs_app.png'),
(3, 8, 'Ember', 'EM', 'lcs_em.png'),
(3, 8, 'Team Dragon Knights', 'TDK', 'lcs_tdk.png'),
(3, 8, 'Dream Team', 'DRT', 'lcs_drt.png'),
(3, 8, 'eUnited', 'EUN', 'lcs_eun.png'),
(3, 8, 'Delta Fox', 'DLF', 'lcs_dlf.png'),
(3, 8, 'Team Gates', 'TGS', 'lcs_tgs.png'),
(3, 8, 'Tempo Storm', 'TPS', 'lcs_tps.png'),
(3, 8, 'Gold Coin United', 'GCU', 'lcs_gcu.png'),
(3, 8, 'Big Gods Jackals', 'BIG', 'lcs_bgj.png'),
-- LCS sem divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
(3, NULL, 'Enemy', 'ENE', 'lcs_ene.png'),
(3, NULL, 'Nova', 'NEW', 'lcs_new.png'),
(3, NULL, 'Eanix', 'ENX', 'lcs_enx.png'),
(3, NULL, 'Cloud9 Challenger', 'C9', 'lcs_c9.png'),
(3, NULL, 'Nova eSports', 'NVS', 'lcs_nvs.png'),
(3, NULL, 'Final Five', 'FF', 'lcs_ff.png'),
(3, NULL, 'Team Fusion', 'TF', 'lcs_tf.png'),
(3, NULL, 'Team Imagine', 'TIG', 'lcs_tig.png'),
(3, NULL, 'Renegades', 'RGS', 'lcs_rgs.png'),
(3, NULL, 'Team Coast', 'TC', 'lcs_tc.png'),
--
--
-- LEC 1ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
(4, 9, 'exceL Esports', 'XL', 'lec_xl.png'),
(4, 9, 'Fnatic', 'FNC', 'lec_fnc.png'),
(4, 9, 'G2 Esports', 'G2', 'lec_g2.png'),
(4, 9, 'Misfits Gaming', 'MSF', 'lec_msf.png'),
(4, 9, 'Origen', 'OR', 'lec_or.png'),
(4, 9, 'Rogue', 'RGE', 'lec_rge.png'),
(4, 9, 'Schalke 04', 'S04', 'lec_s04.png'),
(4, 9, 'SK Gaming', 'SK', 'lec_sk.png'),
(4, 9, 'Splyce', 'SPY', 'lec_spy.png'),
(4, 9, 'Team Vitality', 'VIT', 'lec_vit.png'),
-- LEC 2ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
(4, 10, 'Team ROCCAT', 'ROC', 'lec_roc.png'),
(4, 10, 'Unicorns Of Love', 'UOL', 'lec_uol.png'),
(4, 10, 'Giants Gaming', 'GIA', 'lec_gia.png'),
(4, 10, 'H2k-Gaming', 'H2K', 'lec_h2k.png'),
(4, 10, 'Mysterious Monkeys', 'MM', 'lec_mm.png'),
(4, 10, 'Ninjas in Pyjamas', 'NIP', 'lec_nip.png'),
(4, 10, 'DIVIZON', 'DIV', 'lec_div.png'),
(4, 10, 'D-City Gaming Stars', 'DCG', 'lec_dcg.png'),
(4, 10, 'mYinsanity', 'MYI', 'lec_my.png'),
(4, 10, 'PENTA Sports', 'PTS', 'lec_pts.png'),
-- LEC 3ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
(4, 11, 'Austrian Force eSports', 'ATF', 'lec_atf.png'),
(4, 11, 'BloodRain-Gaming', 'BRG', 'lec_brg.png'),
(4, 11, 'Black Lion', 'bl', 'lec_bl.png'),
(4, 11, 'EYES ON U', 'EOU', 'lec_eou.png'),
(4, 11, 'T3H Esports', 'T3H', 'lec_t3h.png'),
(4, 11, 'eversity', 'EVS', 'lec_evs.png'),
(4, 11, 'la cité', 'LC', 'lec_lc.png'),
(4, 11, 'Entropy Gaming', 'EPY', 'lec_epy.png'),
(4, 11, 'Team Riverside', 'TRS', 'lec_trs.png'),
(4, 11, 'Paris Saint-Germain', 'PSG', 'lec_psg.png'),
-- LEC sem divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
(4, NULL, 'Millenium', 'MM', 'lec_mm.png'),
(4, NULL, 'Red Bulls', 'RB', 'lec_rb.png'),
(4, NULL, 'Wind and Rain', 'WAR', 'lec_war.png'),
(4, NULL, 'Huma', 'HM', 'lec_hm.png'),
(4, NULL, 'Inspire eSports', 'IE', 'lec_ie.png'),
(4, NULL, 'Copenhagen Wolves', 'CW', 'lec_cw.png'),
(4, NULL, 'Epsilon eSports', 'YS', 'lec_ys.png'),
(4, NULL, 'Team Dignitas', 'TD', 'lec_td.png'),
(4, NULL, 'Gamers2', 'G2', 'lec_g2.png'),
(4, NULL, 'Team Forge', 'TF', 'lec_tf.png'),
--
-- 
-- 
-- ATUALIZADO ATE AQUI -------------------------------
-- 
-- ARRUMAR DAQUI PRA BAIXO ---------------------------
-- 
-- 
-- LPL 1ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('5', '12', 'Invictus Gaming', 'IG', 'lpl_ig151.png'),
('5', '12', 'Royal Never Give Up', 'RNG', 'lpl_rng152.png'),
('5', '12', 'Rogue Warriors', 'RW', 'lpl_rw153.png'),
('5', '12', 'EDward Gaming', 'EDG', 'lpl_edg154.png'),
('5', '12', 'Snake Esports', 'SS', 'lpl_ss155.png'),
('5', '12', 'Team WE', 'WE', 'lpl_we156.png'),
('5', '12', 'Oh My God', 'OMG', 'lpl_omg157.png'),
('5', '12', 'JD Gaming', 'JDG', 'lpl_jdg158.png'),
('5', '12', 'Suning Gaming', 'SNG', 'lpl_sng159.png'),
('5', '12', 'Topsports Gaming', 'TOP', 'lpl_top160.png'),
-- LPL 2ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('5', '13', 'FunPlus Phoenix', 'FPX', 'lpl_fpx161.png'),
('5', '13', 'LGD Gaming', 'LGD', 'lpl_lgd162.png'),
('5', '13', 'Bilibili Gaming', 'BLG', 'lpl_BLG163.png'),
('5', '13', 'Vici Gaming', 'VG', 'lpl_vg164.png'),
('5', '13', 'I May', 'IMAY', 'lpl_imay165.png'),
('5', '13', 'QG Reapers', 'QGR', 'lpl_qgr166.png'),
('5', '13', 'Newbee', 'NB', 'lpl_nb167.png'),
('5', '13', 'Game Talents', 'GMT', 'lpl_gmt168.png'),
('5', '13', 'DAN Gaming', 'DAN', 'lpl_dan169.png'),
('5', '13', 'Qiao Gu Reapers', 'QG', 'lpl_qg170.png'),
-- LPL 3ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('5', '14', 'Energy Pacemaker.All', 'EPA', 'lpl_epa171.png'),
('5', '14', 'Masters 3', 'M3', 'lpl_m3172.png'),
('5', '14', 'Hyper Youth Gaming', 'HYG', 'lpl_hyg173.png'),
('5', '14', 'Saint Gaming', 'STG', 'lpl_stg174.png'),
('5', '14', 'Team King', 'KING', 'lpl_king175.png'),
('5', '14', 'Star Horn Royal Club', 'SHR', 'lpl_shr176.png'),
('5', '14', 'Gamtee', 'GT', 'lpl_gt177.png'),
('5', '14', 'Unlimited Potential', 'UP', 'lpl_up178.png'),
('5', '14', 'Positive Energy', 'PSE', 'lpl_pse179.png'),
('5', '14', 'Young Glory', 'YG', 'lpl_yg180.png'),
-- LPL 4ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('5', '15', 'TyLoo', 'TL', 'lpl_tl181.png'),
('5', '15', 'Triumphant Song Gaming', 'TSG', 'lpl_tsg182.png'),
('5', '15', 'VP Game', 'VPG', 'lpl_vpg183.png'),
('5', '15', 'Young Miracles', 'YM', 'lpl_ym184.png'),
('5', '15', 'KeyMedia', 'KM', 'lpl_km185.png'),
('5', '15', 'Legend Dragon', 'LDG', 'lpl_ldg186.png'),
('5', '15', 'Now or Never', 'NON', 'lpl_non187.png'),
('5', '15', 'Team Hurricane', 'THR', 'lpl_thr188.png'),
('5', '15', 'Moss Seven Club', 'MSC', 'lpl_msc189.png'),
('5', '15', 'Joy Dream', 'JD', 'lpl_jd190.png'),
-- LPL sem divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('5', NULL, 'Liberty Zeal Queue', 'LZQ', 'lpl_lzq191.png'),
('5', NULL, 'Si Yi Xuan E-Sport', 'SYX', 'lpl_syx192.png'),
('5', NULL, 'Shadow Cream', 'SC', 'lpl_sc193.png'),
('5', NULL, 'Victorious Gaming', 'VG', 'lpl_vg194.png'),
('5', NULL, 'King of Future', 'KOF', 'lpl_kof195.png'),
-- 
-- 
-- LMS 1ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('6', '16', 'Flash Wolves', 'FW', 'lms_fw196.png'),
('6', '16', 'MAD Team', 'MAD', 'lms_mad197.png'),
('6', '16', 'Hong Kong Attitude', 'HKA', 'lms_hka198.png'),
('6', '16', 'J Team', 'JT', 'lms_jt199.png'),
('6', '16', 'G-Rex', 'GRX', 'lms_grx200.png'),
('6', '16', 'Machi E-Sports', 'M17', 'lms_m17201.png'),
('6', '16', 'Team Afro', 'AFRO', 'lms_afro202.png'),
('6', '16', 'ahq e-Sports Club', 'AHQ', 'lms_ahq203.png'),
('6', '16', 'Fireball', 'FBL', 'lms_fbl204.png'),
('6', '16', 'Wayi Spider', 'WSP', 'lms_`wsp205.png'),
-- LMS 2ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('6', '17', 'eXtreme Gamers', 'XG', 'lms_xg206.png'),
('6', '17', 'Raise Gaming', 'RG', 'lms_rg207.png'),
('6', '17', 'Team Yetti', 'TYT', 'lms_tyt208.png'),
('6', '17', 'Team Mist', 'MIST', 'lms_mist209.png'),
('6', '17', 'NonHK', 'NHK', 'lms_nhk210.png'),
('6', '17', 'Wings of Liberty', 'WOL', 'lms_wol211.png'),
('6', '17', 'Cougar E-Sport', 'CGS', 'lms_cgs212.png'),
('6', '17', 'Taipei Assassins', 'TPA', 'lms_tpb213.png'),
('6', '17', 'Flash Husky', 'FH', 'lms_fh214.png'),
('6', '17', 'Assassin Sniper', 'AS', 'lms_as215.png'),
-- LMS 3ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('6', '18', 'Gash Bears', 'GASH', 'lms_gash216.png'),
('6', '18', 'Midnight Sun Esports', 'MSE', 'lms_mse217.png'),
('6', '18', 'Hong Kong Esports', 'HKES', 'lms_hkes218.png'),
('6', '18', 'Taipei Berserkers', 'TPB', 'lms_tpb219.png'),
('6', '18', 'Dream or Reality', 'DOR', 'lms_dor220.png'),
('6', '18', 'Logitech G Snipers', 'LGS', 'lms_lgs221.png'),
('6', '18', 'Never Give Up', 'NGU', 'lms_ngu222.png'),
('6', '18', 'No Game No Life', 'NGL', 'lms_ngl223.png'),
('6', '18', 'Darling You', 'DLY', 'lms_dly224.png'),
('6', '18', 'Team No Limit', 'TNL', 'lms_tnl225.png'),
-- LMS sem divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('6', NULL, 'Team HopeLess', 'THL', 'lms_thl226.png'),
('6', NULL, 'ebd Legends', 'EBD', 'lms_ebd227.png'),
('6', NULL, 'Ares Gaming', 'ARES', 'lms_ares228.png'),
('6', NULL, 'Kowloon Esports', 'KLE', 'lms_kle229.png'),
('6', NULL, 'K Special Forces', 'KSF', 'lms_ksf230.png'),
('6', NULL, 'One Seven Eight', 'OSE', 'lms_ose231.png'),
('6', NULL, 'Alice Queen', 'AQ', 'lms_aq232.png'),
('6', NULL, 'Buff', 'BUFF', 'lms_buff233.png'),
('6', NULL, 'Forger Esports', 'FGE', 'lms_fge234.png'),
('6', NULL, 'NoFancy', 'NF', 'lms_nf235.png'),
-- 
-- 
-- CIS CL 1ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('7', '19', 'Dragon Army', 'DA', 'ciscl_da236.png'),
('7', '19', 'Elements Pro Gaming', 'EPG', 'ciscl_epg237.png'),
('7', '19', 'Gambit Esports', 'GMB', 'ciscl_gmb238.png'),
('7', '19', 'M19', 'M19', 'ciscl_m19239.png'),
('7', '19', 'RoX', 'ROX', 'ciscl_rox240.png'),
('7', '19', 'Team Just', 'JUST', 'ciscl_just241.png'),
('7', '19', 'Vaevictis eSports', 'VAE', 'ciscl_vae242.png'),
('7', '19', 'Vega Squadron', 'VEGA', 'ciscl_vega243.png'),
('7', '19', 'Natus Vincere', 'NV', 'ciscl_nv244.png'),
('7', '19', 'Virtus Pro', 'VP', 'ciscl_vp245.png'),
-- CIS CL 2ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('7', '20', 'The Largest Salary', 'TLS', 'ciscl_tls246.png'),
('7', '20', 'Comanche', 'CMCE', 'ciscl_cmce247.png'),
('7', '20', 'Dolphins', 'DOL', 'ciscl_dol248.png'),
('7', '20', 'Team Empire', 'EMP', 'ciscl_emp249.png'),
('7', '20', 'Albus NoX', 'ANX', 'ciscl_anx250.png'),
('7', '20', 'Team Differential', 'DFF', 'ciscl_dff251.png'),
('7', '20', 'Hard Random', 'HR', 'ciscl_hr252.png'),
('7', '20', 'Your Exit', 'YE', 'ciscl_ye253.png'),
('7', '20', 'Zoff Gaming', 'ZOFF', 'ciscl_zoff254.png'),
('7', '20', 'Crow Crowd', 'CC', 'ciscl_cc255.png'),
-- CIS CL sem divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('7', NULL, 'Glafi', 'GF', 'ciscl_gl256.png'),
('7', NULL, 'Star', 'STAR', 'ciscl_star257.png'),
('7', NULL, 'Gambit Academy', 'GMBA', 'ciscl_gmba258.png'),
('7', NULL, 'Team Just Challenger', 'TJC', 'ciscl_tjc259.png'),
('7', NULL, 'Tricksters', 'TRX', 'ciscl_trx260.png'),
-- 
-- 
-- LJL 1ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('8', '21', 'DetonatioN FocusMe', 'DFM', 'ljl_dfm261.png'),
('8', '21', 'Unsold Stuff Gaming', 'USG', 'ljl_usg262.png'),
('8', '21', 'PENTAGRAM', 'PGM', 'ljl_pdm263.png'),
('8', '21', 'Burning Core', 'BC', 'ljl_bc264.png'),
('8', '21', 'V3 Esports', 'V3', 'ljl_v3265.png'),
('8', '21', 'Crest Gaming Act', 'CGA', 'ljl_cga266.png'),
('8', '21', 'SCARZ Burning Core', 'SZBC', 'ljl_szbc267.png'),
('8', '21', '7th heaven', '7H', 'ljl_7h268.png'),
('8', '21', 'Rascal Jester', 'RJ', 'ljl_rj269.png'),
('8', '21', 'Unsold Stuff Gaming', 'USG', 'ljl_usg270.png'),
-- LJL 2ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('8', '22', 'Rampage', 'RPG', 'ljl_rpg271.png'),
('8', '22', 'Team BlackEye', 'TBE', 'ljl_tbe272.png'),
('8', '22', 'Overdrive', 'OVD', 'ljl_ovd273.png'),
('8', '22', 'Dragonfly Gaming', 'DFG', 'ljl_dfg274.png'),
('8', '22', 'RabbitFive', 'RBF', 'ljl_rbf275.png'),
('8', '22', 'ApeX R Gaming', 'ARG', 'ljl_arg276.png'),
('8', '22', 'Salvage Javelin', 'SJ', 'ljl_sj277.png'),
('8', '22', 'Okinawan Tigers', 'OTS', 'ljl_ots278.png'),
('8', '22', 'BowQen Blackbucks', 'BQB', 'ljl_bqb279.png'),
('8', '22', 'AKIHABARA ENCOUNT', 'AE', 'ljl_ae280.png'),
-- LJL 3ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('8', '23', 'Smash It Down', 'SID', 'ljl_sid281.png'),
('8', '23', 'SunSister ReUnion', 'SSR', 'ljl_ssr282.png'),
('8', '23', 'Two-eyed Monsters', '2EM', 'ljl_2em283.png'),
('8', '23', 'Sengoku Gaming Legends', 'SGL', 'ljl_sgl284.png'),
('8', '23', 'HarmoniX Gaming', 'HXG', 'ljl_hxg285.png'),
('8', '23', 'Hanagumi Karen', 'HNK', 'ljl_hnk286.png'),
('8', '23', 'Hex Alligators', 'HEX', 'ljl_hex287.png'),
('8', '23', 'Kingdom', 'KNG', 'ljl_kng288.png'),
('8', '23', 'Cyclone', 'CCN', 'ljl_ccn289.png'),
('8', '23', 'Nibble Gaming', 'NBG', 'ljl_nbg290.png'),
-- LJL sem divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('8', NULL, 'Saikyo Makinyan', 'SKM', 'ljl_skm291.png'),
('8', NULL, 'Team Zan', 'ZAN', 'ljl_zan292.png'),
('8', NULL, 'Team Kamikaze', 'TKK', 'ljl_tkk293.png'),
('8', NULL, 'Salvage Javelin', 'SJ', 'ljl_sj294.png'),
('8', NULL, 'Vanquish', 'VH', 'ljl_vh295.png'),
-- 
-- 
-- LLN 1ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('9', '24', 'Rainbow7', 'R7', 'lln_r7296.png'),
('9', '24', 'Predators Esports', 'PDS', 'lln_297.png'),
('9', '24', 'Infinity eSports', 'INF', 'lln_298.png'),
('9', '24', 'Dash9 Gaming', 'D9', 'lln_299.png'),
('9', '24', '6Sense', '6SN', 'lln_300.png'),
('9', '24', 'Gaming Gaming', 'GG', 'lln_gg301.png'),
('9', '24', 'Pixel Esports Club', 'PIX', 'lln_302.png'),
('9', '24', 'ZAGA Talent Gaming', 'ZTG', 'lln_ztg303.png'),
('9', '24', 'Elite Wolves', 'EW', 'lln_ew304.png'),
('9', '24', 'PEX Team', 'PEX', 'lln_pex305.png'),
-- LLN 2ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('9', '25', 'Authority E-sports', 'AUT', 'lln_aut306.png'),
('9', '25', 'Ordo Equitum', 'OE', 'lln_oe307.png'),
('9', '25', 'Just Toys Gaming1', 'JTG', 'lln_jtg308.png'),
('9', '25', 'LoL Academia', 'LAE', 'lln_lae309.png'),
('9', '25', 'Regular Team', 'RT', 'lln_rt310.png'),
('9', '25', 'VAULT', 'VT', 'lln_vt311.png'),
('9', '25', 'Zeu5 Gaming2', 'Z5', 'lln_z5312.png'),
('9', '25', 'Loto Gaming', 'LTG', 'lln_ltg313.png'),
('9', '25', 'Fuego', 'FG', 'lln_fg314.png'),
('9', '25', 'Lyon Gaming', 'LYG', 'lln_lyg315.png'),
-- LLN 3ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('9', '26', 'Silver Crows', 'SC', 'lln_sc316.png'),
('9', '26', 'Infamous Gaming', 'IFG', 'lln_ifg317.png'),
('9', '26', 'Satori', 'STR', 'lln_str318.png'),
('9', '26', 'Darkness Eagles', 'DE', 'lln_de319.png'),
('9', '26', 'Exceltec Predators', 'EXP', 'lln_exp320.png'),
('9', '26', 'Revenge eSports', 'RVG', 'lln_rvg321.png'),
('9', '26', 'BrawL eSports', 'BWL', 'lln_bwl322.png'),
('9', '26', 'Space eSports', 'SPE', 'lln_spe323.png'),
('9', '26', 'Galactic Gamers', 'GLG', 'lln_gcg324.png'),
('9', '26', 'Tesla E-Sports', 'TLE', 'lln_tle325.png'),
-- LLN sem divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('9', NULL, 'Havoks Gaming', 'HVG', 'lln_hvg326.png'),
('9', NULL, 'Perfectionvore', 'PFV', 'lln_pfv327.png'),
('9', NULL, 'Red Arrows Team', 'RAT', 'lln_rat328.png'),
('9', NULL, 'DnH Advance', 'DNH', 'lln_dnh329.png'),
('9', NULL, 'Groovy Gaming', 'GVG', 'lln_gvg330.png'),
('9', NULL, 'Meet Your Makers.LAN', 'MYM', 'lln_mym331.png'),
('9', NULL, 'Osos Mafiosos', 'OSM', 'lln_osm332.png'),
('9', NULL, 'Seven Wars Lyon', '7WL', 'lln_7wl333.png'),
('9', NULL, 'Team Quetzal', 'TQZ', 'lln_tqz334.png'),
('9', NULL, 'Team LoL Cave', 'TLC', 'lln_tlc335.png'),
-- 
-- 
-- CLS 1ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('10', '27', 'Kaos Latin Gamers', 'KLG', 'cls_klg336.png'),
('10', '27', 'Rebirth eSports', 'RBT', 'cls_rbt337.png'),
('10', '27', 'Isurus Gaming', 'ISG', 'cls_isg338.png'),
('10', '27', 'Furious Gaming', 'FG', 'cls_fg339.png'),
('10', '27', 'Legatum', 'LGT', 'cls_lgt340.png'),
('10', '27', 'Evilvice Esports', 'EVV', 'cls_ew341.png'),
('10', '27', 'Hafnet eSports', 'HAF', 'cls_haf342.png'),
('10', '27', 'Dark Horse', 'DH', 'cls_dh343.png'),
('10', '27', 'Coscu Army', 'CA', 'cls_ca344.png'),
('10', '27', 'UC Esports', 'UC', 'cls_uc345.png'),
-- CLS 2ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('10', '28', 'Mad Kings', 'MK', 'cls_mk346.png'),
('10', '28', 'Feint Gaming', 'FG', 'cls_fg347.png'),
('10', '28', 'Born to Kill', 'BTK', 'cls_btk348.png'),
('10', '28', 'Instinct Gaming', '', 'cls_349.png'),
('10', '28', 'Royal Penguins', '', 'cls_350.png'),
('10', '28', 'FroztFire Team', '', 'cls_351.png'),
('10', '28', 'Bring It On', '', 'cls_352.png'),
('10', '28', 'Andes Esports1', '', 'cls_353.png'),
('10', '28', ' Undead Gaming1', '', 'cls_354.png'),
('10', '28', ' Thunder Awaken1', '', 'cls_355.png'),
-- CLS sem divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('10', NULL, 'Coliseo Dragons', 'CDG', 'cls_cdg356.png'),
('10', NULL, 'Nocturns Gaming', 'NG', 'cls_ng357.png'),
('10', NULL, 'Imperium Gaming', 'IG', 'cls_ig358.png'),
('10', NULL, 'Force Of Nature', 'FON', 'cls_fon359.png'),
('10', NULL, 'Tech Titans', 'TT', 'cls_tt360.png'),
('10', NULL, 'Last Kings', 'LKG', 'cls_lkg361.png'),
('10', NULL, 'Bencheados', 'BCD', 'cls_bcd362.png'),
('10', NULL, 'Freedom Dive', 'FDV', 'cls_fdv363.png'),
('10', NULL, 'ChiLean FivE', 'CFV', 'cls_cfv364.png'),
('10', NULL, 'Dynasty Gaming', 'DNT', 'cls_dnt365.png'),
-- 
-- 
-- OPL 1ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('11', '29', 'Dire Wolves', 'DW', 'opl_dw366.png'),
('11', '29', 'Chiefs Esports Club', 'CHF', 'opl_chf367.png'),
('11', '29', 'Order', 'ORD', 'opl_ord368.png'),
('11', '29', 'Legacy Esports', 'LGC', 'opl_lgc369.png'),
('11', '29', 'Bombers', 'BMR', 'opl_bmr370.png'),
('11', '29', 'Mammoth Esports', 'MMM', 'opl_mmm371.png'),
('11', '29', 'Avant Garde', 'AV', 'opl_av372.png'),
('11', '29', 'Tectonic', 'TTC', 'opl_ttc373.png'),
('11', '29', 'Sin Gaming', 'SIN', 'opl_sin374.png'),
('11', '29', 'Team Regicide', 'TRC', 'opl_trc375.png'),
-- OPL 2ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('11', '30', 'Abyss Esports', 'AE', 'opl_ae376.png'),
('11', '30', 'TM Gaming', 'TMG', 'opl_tmg377.png'),
('11', '30', 'Outlaws', 'OUT', 'opl_out378.png'),
('11', '30', 'Team Exile5', 'TE5', 'opl_te5379.png'),
('11', '30', 'Tainted Minds', 'TMS', 'opl_tms380.png'),
('11', '30', 'Hellions e-Sports Club', 'HSC', 'opl_hsc381.png'),
('11', '30', 'Intuition', 'ITT', 'opl_itt382.png'),
('11', '30', 'Emprox', 'EMP', 'opl_emp383.png'),
('11', '30', 'Crimson Gaming', 'CG', 'opl_cg384.png'),
('11', '30', 'QUT Tigers', 'QUT', 'opl_qut385.png'),
-- OPL 3ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('11', '31', 'Ground Zero Gaming', 'GZG', 'opl_gzg386.png'),
('11', '31', 'Lynx', 'LYNX', 'opl_lynx387.png'),
('11', '31', 'Alpha Sydney', 'ASY', 'opl_asy388.png'),
('11', '31', 'Infernum Gaming', 'IG', 'opl_ig389.png'),
('11', '31', 'Trident Esports', 'TE', 'opl_te390.png'),
('11', '31', 'Absolute', 'ABS', 'opl_abs391.png'),
('11', '31', 'Team Immunity', 'TI', 'opl_ti392.png'),
('11', '31', 'Sudden Fear', 'SF', 'opl_sf393.png'),
('11', '31', 'Nuovo Gaming', 'NG', 'opl_ng394.png'),
('11', '31', 'Reload eSports', 'RS', 'opl_rs395.png'),
-- OPL sem divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('11', NULL, 'Team 4 Not', '4N', 'opl_4n396.png'),
('11', NULL, 'Sentinels ESC', 'SESC', 'opl_sesc397.png'),
('11', NULL, 'Rich Gang', 'RG', 'opl_rg398.png'),
('11', NULL, 'Symphony', 'SYPH', 'opl_syph399.png'),
('11', NULL, 'Tainted Minds Blue', 'TMB', 'opl_tmb400.png'),
-- 
-- 
-- TCL 1ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('13', '', '', '', 'tcl_.png'),
('13', '', '', '', 'tcl_.png'),
('13', '', '', '', 'tcl_.png'),
('13', '', '', '', 'tcl_.png'),
('13', '', '', '', 'tcl_.png'),
('13', '', '', '', 'tcl_.png'),
('13', '', '', '', 'tcl_.png'),
('13', '', '', '', 'tcl_.png'),
('13', '', '', '', 'tcl_.png'),
('13', '', '', '', 'tcl_.png'),
-- TCL 2ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('13', '', '', '', 'tcl_.png'),
('13', '', '', '', 'tcl_.png'),
('13', '', '', '', 'tcl_.png'),
('13', '', '', '', 'tcl_.png'),
('13', '', '', '', 'tcl_.png'),
('13', '', '', '', 'tcl_.png'),
('13', '', '', '', 'tcl_.png'),
('13', '', '', '', 'tcl_.png'),
('13', '', '', '', 'tcl_.png'),
('13', '', '', '', 'tcl_.png'),
-- TCL sem divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
('13', NULL, '', '', 'tcl_.png'),
('13', NULL, '', '', 'tcl_.png'),
('13', NULL, '', '', 'tcl_.png'),
('13', NULL, '', '', 'tcl_.png'),
('13', NULL, '', '', 'tcl_.png'),
('13', NULL, '', '', 'tcl_.png'),
('13', NULL, '', '', 'tcl_.png'),
('13', NULL, '', '', 'tcl_.png'),
('13', NULL, '', '', 'tcl_.png'),
('13', NULL, '', '', 'tcl_.png'),
-- 
-- 
-- ??? 1ª divisao --
-- (`idleague`, `iddivision`, `desname`, `desinitials`, `desimage`) --
--('?', '??', '', '', '???_.png'),
-- ??? 2ª divisao --
--('?', '??', '', '', '???_.png'),
-- ??? sem divisao --
--('?', NULL, '', '', '???_.png'),
--('?', NULL, '', '', '???_.png')
;
--
--
--
