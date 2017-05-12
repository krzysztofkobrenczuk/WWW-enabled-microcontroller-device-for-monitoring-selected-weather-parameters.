window.onload = function () {



 zingchart.render({
        id: "naslonecznienie",
        width: "100%",
        height: 300,
        data: {       
            "type": "line", //typ lini
            "title": {
                "text": "Natezenie"
            },
            //Os X
            "scale-x": {
                "labels": i,
                
                "item": {           // kolor osi X
                    "font-color": "#003849"
                },
                 "tick": {
                    "line-color": "#003849"
                }
            },
            "scale-y": {
                "values": "0:100:20",          //skala y
                "line-color": "#003849",
                "shadow": 0,
                "tick": {
                    "line-color": "#003849"
                },
                "guide": {          //przerywana linia na osi Y
                    "line-color": "#003849",
                    "line-style": "dashed"
                },
                "item": {           // kolor osi Y
                    "font-color": "#003849"
                },
                "label": {          //Opis osi Y
                    "text": "Nat&#281;&#380;enie [%]",
                    "font-color": "#003849"
                },
                "minor-ticks": 0,
                "thousands-separator": ","
            },
            "crosshair-x": {
                "line-color": "#003849",
                "plot-label": {     //Opis poszczegolnych punktow
                    "border-radius": "5px",
                    "border-width": "1px",
                    "border-color": "#003849",
                    "padding": "10px",
                    "font-weight": "bold"
                },
                "scale-label": {        //Podswietlenie czasu na dole skali
                    "font-color": "#00baf0",
                    "background-color": "#003849",
                    "border-radius": "5px"
                }
            },
            "tooltip": {
                "visible": false
            },
            "plot": {       //siatka i kó&#322;eczko
                "shadow": 0,
                "line-width": "2px",
                "marker": {
                    "type": "circle",
                    "size": 3
                },
                "hover-marker": {       // po najechaniu na kó&#322;eczko
                    "type": "circle",
                    "size": 4,
                    "border-width": "1px"
                }
            },
            "series": [
                {
                    "values": siema,
                    "text": "Nat&#281;&#380;enie",      //Tekst po najechaniu
                    "line-color": "#5A4D75",
//                    "legend-marker": {
//                        "type": "circle",
//                        "size": 5,
//                        "background-color": "#003849",
//                        "border-width": 1,
//                        "shadow": 0,
//                        "border-color": "#003849"
//                    },
                    "marker": {
                        "background-color": "#5A4D75",
                        "border-width": 1,
                        "shadow": 0,
                        "border-color": "#003849"
                    }
                }
            ]
        }
    });




    zingchart.render({
        id: "myChart",
        width: "100%",
        height: 300,
        data: {       
            "type": "line", //typ lini
            "title": {
                "text": "Temperatura"
            },
            //Os X
            "scale-x": {
                "labels": myLabels,
                
                "item": {           // kolor osi X
                    "font-color": "#003849"
                },
                 "tick": {
                    "line-color": "#003849"
                }
            },
            "scale-y": {
                "values": "-20:30:10",          //skala y
                "line-color": "#003849",
                "shadow": 0,
                "tick": {
                    "line-color": "#003849"
                },
                "guide": {          //przerywana linia na osi Y
                    "line-color": "#003849",
                    "line-style": "dashed"
                },
                "item": {           // kolor osi Y
                    "font-color": "#003849"
                },
                "label": {          //Opis osi Y
                    "text": "Celsjusz [C]",
                    "font-color": "#003849"
                },
                "minor-ticks": 0,
                "thousands-separator": ","
            },
            "crosshair-x": {
                "line-color": "#003849",
                "plot-label": {     //Opis poszczegolnych punktow
                    "border-radius": "5px",
                    "border-width": "1px",
                    "border-color": "#003849",
                    "padding": "10px",
                    "font-weight": "bold"
                },
                "scale-label": {        //Podswietlenie czasu na dole skali
                    "font-color": "#00baf0",
                    "background-color": "#003849",
                    "border-radius": "5px"
                }
            },
            "tooltip": {
                "visible": false
            },
            "plot": {       //siatka i kó&#322;eczko
                "shadow": 0,
                "line-width": "2px",
                "marker": {
                    "type": "circle",
                    "size": 3
                },
                "hover-marker": {       // po najechaniu na kó&#322;eczko
                    "type": "circle",
                    "size": 4,
                    "border-width": "1px"
                }
            },
            "series": [
                {
                    "values": myData,
                    "text": "Temperatura",      //Tekst po najechaniu
                    "line-color": "#5A4D75",
//                    "legend-marker": {
//                        "type": "circle",
//                        "size": 5,
//                        "background-color": "#003849",
//                        "border-width": 1,
//                        "shadow": 0,
//                        "border-color": "#003849"
//                    },
                    "marker": {
                        "background-color": "#5A4D75",
                        "border-width": 1,
                        "shadow": 0,
                        "border-color": "#003849"
                    }
                }
            ]
        }
    });
    
    zingchart.render({
        id: "wilgo",
        width: "100%",
        height: 300,
        data: {       
            "type": "line", //typ lini
            "title": {
                "text": "Wilgotnosc"
            },
            //Os X
            "scale-x": {
                "labels": wartosci,
                
                "item": {           // kolor osi X
                    "font-color": "#003849"
                },
                 "tick": {
                    "line-color": "#003849"
                }
            },
            "scale-y": {
                "values": "0:100:20",          //skala y
                "line-color": "#003849",
                "shadow": 0,
                "tick": {
                    "line-color": "#003849"
                },
                "guide": {          //przerywana linia na osi Y
                    "line-color": "#003849",
                    "line-style": "dashed"
                },
                "item": {           // kolor osi Y
                    "font-color": "#003849"
                },
                "label": {          //Opis osi Y
                    "text": "Wilgotnosc [%]",
                    "font-color": "#003849"
                },
                "minor-ticks": 0,
                "thousands-separator": ","
            },
            "crosshair-x": {
                "line-color": "#003849",
                "plot-label": {     //Opis poszczegolnych punktow
                    "border-radius": "5px",
                    "border-width": "1px",
                    "border-color": "#003849",
                    "padding": "10px",
                    "font-weight": "bold"
                },
                "scale-label": {        //Podswietlenie czasu na dole skali
                    "font-color": "#00baf0",
                    "background-color": "#003849",
                    "border-radius": "5px"
                }
            },
            "tooltip": {
                "visible": false
            },
            "plot": {       //siatka i kó&#322;eczko
                "shadow": 0,
                "line-width": "2px",
                "marker": {
                    "type": "circle",
                    "size": 3
                },
                "hover-marker": {       // po najechaniu na kó&#322;eczko
                    "type": "circle",
                    "size": 4,
                    "border-width": "1px"
                }
            },
            "series": [
                {
                    "values": data,
                    "text": "Wilgotno&#347;&#263;",      //Tekst po najechaniu
                    "line-color": "#5A4D75",
//                    "legend-marker": {
//                        "type": "circle",
//                        "size": 5,
//                        "background-color": "#003849",
//                        "border-width": 1,
//                        "shadow": 0,
//                        "border-color": "#003849"
//                    },
                    "marker": {
                        "background-color": "#5A4D75",
                        "border-width": 1,
                        "shadow": 0,
                        "border-color": "#003849"
                    }
                }
            ]
        }
    });
    
    
        zingchart.render({
        id: "cis",
        width: "100%",
        height: 300,
        data: {       
            "type": "line", //typ lini
            "title": {
                "text": "Cisnienie"
            },
            //Os X
            "scale-x": {
                "labels": w,
                
                "item": {           // kolor osi X
                    "font-color": "#003849"
                },
                 "tick": {
                    "line-color": "#003849"
                }
            },
            "scale-y": {
                "values": "950:1050:20",          //skala y
                "line-color": "#003849",
                "shadow": 0,
                "tick": {
                    "line-color": "#003849"
                },
                "guide": {          //przerywana linia na osi Y
                    "line-color": "#003849",
                    "line-style": "dashed"
                },
                "item": {           // kolor osi Y
                    "font-color": "#003849"
                },
                "label": {          //Opis osi Y
                    "text": "Cisnienie [hPa]",
                    "font-color": "#003849"
                },
                "minor-ticks": 0,
                "thousands-separator": ","
            },
            "crosshair-x": {
                "line-color": "#003849",
                "plot-label": {     //Opis poszczegolnych punktow
                    "border-radius": "5px",
                    "border-width": "1px",
                    "border-color": "#003849",
                    "padding": "10px",
                    "font-weight": "bold"
                },
                "scale-label": {        //Podswietlenie czasu na dole skali
                    "font-color": "#00baf0",
                    "background-color": "#003849",
                    "border-radius": "5px"
                }
            },
            "tooltip": {
                "visible": false
            },
            "plot": {       //siatka i kó&#322;eczko
                "shadow": 0,
                "line-width": "2px",
                "marker": {
                    "type": "circle",
                    "size": 3
                },
                "hover-marker": {       // po najechaniu na kó&#322;eczko
                    "type": "circle",
                    "size": 4,
                    "border-width": "1px"
                }
            },
            "series": [
                {
                    "values": d,
                    "text": "Cisnienie",      //Tekst po najechaniu
                    "line-color": "#5A4D75",
//                    "legend-marker": {
//                        "type": "circle",
//                        "size": 5,
//                        "background-color": "#003849",
//                        "border-width": 1,
//                        "shadow": 0,
//                        "border-color": "#003849"
//                    },
                    "marker": {
                        "background-color": "#5A4D75",
                        "border-width": 1,
                        "shadow": 0,
                        "border-color": "#003849"
                    }
                }
            ]
        }
    });


    


};