function initialize(){
	
	//■地図を表示する緯度経度を指定する
	var latlng = new google.maps.LatLng(lat,lng);
	var latlng2 = new google.maps.LatLng(lat2,lng2);
	var latlng3 = new google.maps.LatLng(lat3,lng3);
    var tmp_latlng = new google.maps.LatLng(t_lat , t_lng);
    var center_lat = (lat+lat2+lat3+t_lat)/4;
    var center_lng = (lng+lng2+lng3+t_lng)/4;
    var center_latlng = new google.maps.LatLng(center_lat,center_lng);
    // var mid_latlng = new google.maps.LatLng((lat+t_lat)/2,(lng+t_lng)/2);
	var myOptions={
		
		zoom:14,
        center:center_latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
 
	};
	var map = new google.maps.Map(document.getElementById("map_canvas"),myOptions);
	
    var icon = new    google.maps.MarkerImage('marker_restaurant.jpg',
    new google.maps.Size(20,20),/*アイコンサイズ設定*/
    new google.maps.Point(10,10)/*アイコン位置設定*/
    );
    
    // お店1のマーカー
    var image ='mapicons01-061.png';
	var marker1= new google.maps.Marker({
		position: latlng,
        title: "店1の所在地",
        icon: image
        
	});
	marker1.setMap(map);
    
    //現在地のマーカー
    var marker0=new google.maps.Marker({
        position: tmp_latlng,
	    title:"現在地",
    });
    marker0.setMap(map);
    
    //お店2のマーカー
    var image2 ='mapicons01-068.png';
	var marker2= new google.maps.Marker({
		position: latlng2,
        title: "店2の所在地",
        icon: image2
        
	});
	marker2.setMap(map);

    //お店3のマーカー
    var image3 ='mapicons01-069.png';   
	var marker3= new google.maps.Marker({
		position: latlng3,
        title: "店3の所在地",
        icon: image3
        
	});
	marker3.setMap(map);	
}