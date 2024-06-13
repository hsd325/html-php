<b>職訓局期間，製作的html+php，總共有14個排版練習和8個作品<br>
SQL資料夾裡放置作品所需的資料表
<br>
  <br>

# 網頁範例連結
注意!因為用免費的網站上架，所以頁面讀取會比較慢，需要等待或再執行一次<br>
連結 : https://hsd325.github.io/html-php/

# 首頁 index.html
- 有使用RWD技術

![螢幕擷取畫面 2024-06-05 161104](https://github.com/hsd325/html-php/assets/100175482/4e163184-bd6a-4162-95ee-dfd220102ffd)

# 排版練習
- 總共有14個練習

![螢幕擷取畫面 2024-06-05 160527](https://github.com/hsd325/html-php/assets/100175482/99b26f9c-5e68-42a4-8766-13abceecc862)

---

# 1.抓取js資料
## 前端畫面

![works02](https://github.com/hsd325/html-php/assets/100175482/7ca52ef2-05e9-42a7-8262-9e9c70fb8cac)

## 作品技術
- jquery抓取jason檔資料，再使用資料排版

## 使用工具

- Bootstrap v5.2.3
- jQuery v3.7.1

---

# 2.蛋糕首頁
## 前端畫面
首頁，右上角有公司介紹、產品介紹的連結

![works03](https://github.com/hsd325/html-php/assets/100175482/09e30fac-bbf2-4c01-b9aa-f88b1624c279)

公司介紹

![螢幕擷取畫面 2024-06-05 172043](https://github.com/hsd325/html-php/assets/100175482/900f56d6-42b6-40bf-9d00-d870e9ad160f)

產品介紹頁面，查看按鈕按下會跳轉產品細節

![螢幕擷取畫面 2024-06-05 172616](https://github.com/hsd325/html-php/assets/100175482/8be309d0-2540-4ba9-9d0f-a8233146c632)

產品細節，單純排版無功能

![螢幕擷取畫面 2024-06-05 172630](https://github.com/hsd325/html-php/assets/100175482/5660a02f-a2a2-4c49-8c78-1b403bc90d4c)

## 作品技術
首頁
- RWD功能，畫面縮小會改變排版

公司介紹
- css的before元素來排版

產品細節
- 抓取jason檔案的資料來使用

## 使用工具

- Bootstrap v5.2.3
- jQuery v3.7.1

---

# 3.飲料首頁
## 前端畫面
首頁未登入時，無法使用高級功能

![螢幕擷取畫面 (205)](https://github.com/hsd325/html-php/assets/100175482/d8012693-6758-4dd2-8ec6-668104c89cf1)

登入後右邊會顯示登入帳號，並且可使用高級功能(商品建檔、商品瀏覽、會員管理)

![螢幕擷取畫面 (206)](https://github.com/hsd325/html-php/assets/100175482/44ee4c2a-8a3e-434a-86b6-045d564e2d31)

商品建檔，可建造商品，如果未登入進入商品建檔會跳轉回首頁

![螢幕擷取畫面 (208)](https://github.com/hsd325/html-php/assets/100175482/5be03717-3e87-43fa-81e6-daf4a0bd6488)

商品瀏覽，更新按鈕可更改商品名字和價格

![螢幕擷取畫面 (209)](https://github.com/hsd325/html-php/assets/100175482/70e3d2af-2beb-482f-9ef0-d67851034367)

會員管理，下面有分頁按鈕

![螢幕擷取畫面 (210)](https://github.com/hsd325/html-php/assets/100175482/cdde292e-8601-4cb4-a951-cb1e508934ab)

## 作品技術
所有頁面皆有使用jquery的ajax功能和資料表互動
<br>

首頁
- WOW和Animate外部插件製作物件動畫
- 運用cookie來讓網頁持續登入，就算網頁關閉，重開還是登入狀態
- jquery的監聽元件功能進行監聽和動作

會員管理
- bootstrap和陣列製作分頁
- jquery的監聽元件功能進行監聽和動作

## 使用工具
- Bootstrap v5.2.3
- jQuery v3.7.1
- wow.js
- animate v4.0.0

---

# 4.旅館資料
## 前端畫面
按下Google Map按鈕會跳到旅館的地圖位置

![螢幕擷取畫面 (211)](https://github.com/hsd325/html-php/assets/100175482/ccaebd2a-b9b1-4ff5-a2d4-a5c69599ad8b)

## 作品技術
- jQuery和陣列執行資料重組，而不是使用資料表的分類來完成

## 使用工具
- Bootstrap v5.2.3
- jQuery v3.7.1

---

# 5.統計資料
## 前端畫面
長條圖+圓餅圖，滑鼠移到圖表上會出現相應資訊

![螢幕擷取畫面 (215)](https://github.com/hsd325/html-php/assets/100175482/344d65cc-95e4-46b9-b3c8-c1062b098efa)

![螢幕擷取畫面 (216)](https://github.com/hsd325/html-php/assets/100175482/2e9b63c7-247f-408d-bed0-d17c98dcd30d)

折線圖，滑鼠移到圖表上會出現相應資訊

![螢幕擷取畫面 (217)](https://github.com/hsd325/html-php/assets/100175482/a39b2882-ef73-4745-821f-1acb30420296)

## 作品技術
- chart.js外部插件製作統計圖表

## 使用工具
- Bootstrap v5.2.3
- jQuery v3.7.1
- chart.js

---

# 6.縣市長條圖
## 前端畫面
點選左邊縣市清單，右邊會出現縣市對應的旅館分布長條圖

![螢幕擷取畫面 (218)](https://github.com/hsd325/html-php/assets/100175482/3dbb38fb-a9cb-42ef-9ebb-c0cc9ea506d6)

## 作品技術
- axios外部插件和資料表的連接
- chart.js外部插件製作統計圖表
- jquery的監聽元件功能進行監聽和動作

## 使用工具
- Bootstrap v5.2.3
- jQuery v3.7.1
- axios v1.6.7
- chart.js

---

# 7.口罩地圖
## 前端畫面
左邊下拉清單可選取縣市和區域，選好後地圖和左邊清單會出現水滴座標、藥局資料

![螢幕擷取畫面 (219)](https://github.com/hsd325/html-php/assets/100175482/13140516-8b38-4644-9ae2-978cf0eba9c7)

點選左邊清單或水滴座標，皆會在地圖顯示藥局資料

![螢幕擷取畫面 (220)](https://github.com/hsd325/html-php/assets/100175482/16748dd6-88ee-40d1-a8c6-fc775b482008)

滑鼠中鍵滾輪可調整地圖大小，縮小時水滴座標會集合起來變成數字，放大時會重新顯現水滴座標

![螢幕擷取畫面 (223)](https://github.com/hsd325/html-php/assets/100175482/e86fe1b8-a53c-4a7a-bf16-6809db2b11d7)

![螢幕擷取畫面 (224)](https://github.com/hsd325/html-php/assets/100175482/2f0dbd98-64e8-4f40-ad55-437b6eb11b27)

點選集和數字，地圖會移動到集和數字位置，並調整到適合的大小，且會顯示集合數字包含的所有水滴座標

![螢幕擷取畫面 (222)](https://github.com/hsd325/html-php/assets/100175482/28116983-7ae5-47bb-96d9-20af08a80829)

![螢幕擷取畫面 (225)](https://github.com/hsd325/html-php/assets/100175482/9662fcb5-7cc7-4bde-bf37-3aeeea829988)

## 作品技術
- axios外部插件和資料表的連接
- jquery的監聽元件功能進行監聽和動作
- Leaflet外部插件，為OMS交互式地圖，可顯示地圖和加入水滴座標
- Leaflet.markercluster外部插件，用來提升Leaflet的顯示效能，地圖縮小到一定程度水滴會隱藏並變成集合數字

## 使用工具
- Bootstrap v5.2.3
- jQuery v3.7.1
- axios v1.6.7
- Leaflet V1.9.4
- Leaflet.markercluster.js

---

# 8.全台地圖
## 前端畫面
可看見全台灣的藥局分布

![螢幕擷取畫面 (226)](https://github.com/hsd325/html-php/assets/100175482/e92b0c5b-7c06-4b59-96db-7f999f6b73a2)

## 作品技術
- axios外部插件和資料表的連接
- Leaflet外部插件，為OMS交互式地圖，可顯示地圖和加入水滴座標
- Leaflet.markercluster外部插件，用來提升Leaflet的顯示效能，地圖縮小到一定程度水滴會隱藏並變成集合數字

## 使用工具
- Bootstrap v5.2.3
- jQuery v3.7.1
- axios v1.6.7
- Leaflet V1.9.4
- Leaflet.markercluster.js
