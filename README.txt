MÔ TẢ CHÍNH CHỨC NẮNG
- 3 Roles
+ Guest : Xem danh sách, chi tiết sản phẩm, Đăng nhập
+ User : Xem danh sách, chi tiết, thêm sản phẩm vào giỏ hàng, Đăng nhập, Đăng xuất
+ Admin : Thêm sản phẩm qua form, file csv, đăng xuất

HƯỚNG DẪN CÀI ĐẶT : 
B1: Vào trong thư mục của server nginx (/var/www/html) sau đó đặt tên tạo mới thư mục là PHPmvc ở đây
B2: Clone project về thư mục PHPmvc này
B3: Import file dbGameStore.sql vào database
B4: chỉnh sửa /PHPmvc/application/config/database.php thành cấu hình database mysql tương ứng
B5: Chạy project tại đường dẫn : http://localhost/PHPmvc/index.php?url=gameController
B6: Khi add game bằng file csv. Cấu hình như file csv đã có sẵn

Link tài liệu: https://docs.google.com/document/d/1msidcLGnnaKIPMqBU7OW_qvKkUSkiZnr5mPmVfhh5nk/edit?usp=sharing

Overview:
application directory is the web app’s directory;

framework directory is for the framework itself;

public directory is to store all the public static resources like html, css and js files.

index.php is the ‘entry-point’ file, the front controller.

Detail:
config - stores the app’s configuration files

controllers - this is for all app’s Controller classes

model - this is for all app’s Model classes

view - this is for all app’s View classes

core - it will store the framework’s core classes

database - database related classes, such as database driver classes

helpers - help/assistant functions

libraries - for class libraries

css - for css files

images - for images files

js - for javascript files

uploads - for uploaded files, such as uploaded images

.env - Using for hiding serect information (not commit this to git . it will in .gitignore) - Change env for different purpose