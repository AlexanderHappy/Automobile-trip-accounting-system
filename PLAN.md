## План приложения:
1. CRUD для рейсов: <br>
    а) Index -> получение всех рейсов;<br>
    б) Read -> Прочитать один рейс;<br>
    в) Delete -> Удалить рейс;<br>
    г) Update -> Обновить рейс;<br>
    д) Create -> Создать рейс; (При создании автоматически создается запись в auto_trips_brand_model)<br>

2. Create операция:
3. Сначала добавляем данные в auto_trip_data;
4. По id ищем нужные car_brand и car_model;
5. Добавляем запись ою этом в auto_trips_brand_model
6. Затем добавляем запись в auto_trips;
