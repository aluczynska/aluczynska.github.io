﻿<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Szukaj w Google</title>
    <link rel="icon" href="icon.png">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js" integrity="sha512-JZSo0h5TONFYmyLMqp8k4oPhuo6yNk9mHM+FY50aBjpypfofqtEWsAgRDQm94ImLCzSaHeqNvYuD9382CEn2zw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div id="app" :class="[change_class == 1 ? 'results' : 'home']">
       <nav class="nav_tools">
            <a href="#">Gmail</a>
            <a href="#">Grafika</a>
            <img src="menu.png" class="google_apps" role="button"></img>
            <button>Zaloguj się</button>
        </nav>
        <section class="glowna">
            <img src="google.png" class="logo">
            <form>
                <br><br>
                <div class="elementy">
                    <div class="lista">
                    <input ref="first" v-model="googleSearch" type="text" class="glownainput" @focus="focused" v-on:keyup.down="downKey" v-on:keyup.up="upKey" v-on:keyup.enter="enterKey" @input="findResultsDebounced"/>
                    <div class="bottom_border"></div>	
                <div class="list">	
                  <ul v-for="(city, index) in filteredCities" v-on:click="update_input(city.name)">	
                    <li :class="{greyspace: index == in_focus}">		
                       <a v-on:click="choose(index)" v-html="bolderize(city)">{{ city }}</a>	
                    </li>	
                  </ul>	
                </div>	
              </div>	
                <img src="search.png" class="glownaicon"/>
                    <img src="mikrofon.png" class="glownavoice"/>
                    <input v-on:click="change_page" type="button" class="search_button" value="Sukaj w google"/>
                    <input v-on:click="change_page" type="button" class="search_button" value="Szczęśliwy traf"/>
                </div>
            </form>
        </section>
        <footer class="home_foot">
            <h4>Polska</h4>
            <div class="links">
                <div class="link1">
                    <a href="#">O nas</a>
                    <a href="#">Reklamuj się</a>
                    <a href="#">Dla firm</a>
                    <a href="#">Jak działa wyszukiwarka</a>
                </div>
                <div class="link2">
                    <a href="#"><img src="lisc.png" class="leaf">Nautralność węglowa od 2007 roku</a>
                </div>
                <div class="link3">
                    <a href="#">Prywatność</a>
                    <a href="#">Warunki</a>
                    <a href="#">Ustawienia</a>
                </div>
            </div>
        </footer>
        <div class="top_nav">

            <img src="https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_92x30dp.png" alt=""  v-on:click="change_page()">

            <ul class="accountopt">
                <li><a href="#"><img src="menu.png" class="google_apps" role="button"></a></li>
                <li><button class="sign" type="button" name="button">Zaloguj się</button></li>
            </ul>
            <div class="search_tools">

                <div class="search_elem">
                    <input ref="second" type="text" v-model="googleSearch"/>
                    <img src="lupa.png" class="search_icon">
                    <img src="mikrofon.png" class="search_voice">
                    <img src="klawiatura.png" class="search_keyboard">
                    <div class="line"></div>
                    <img src="x.png" class="search_x">
                </div>
                <ul class="search_options">
                    <li class="left active"><a href="#">Wszystko</a></li>
                    <li class="left"><a href="#">Wiadomości</a></li>
                    <li class="left"><a href="#">Grafika</a></li>
                    <li class="left"><a href="#">Wideo</a></li>
                    <li class="left"><a href="#">Mapy</a></li>
                    <li class="left"><a href="#">Więcej</a></li>
                    <li class="left"><a class="tools" href="#">Narzędzia</a></li>
                    <li class="left"><a href="#">Ustawienia</a></li>
                </ul>
            </div>
        </div>
        <div class="searchResults">
            <p class="results_number">Około 9 540 000 000 wyników (0,43 s)</p>

            <div class="result">
                <a class="link" href="#">www.filmweb.pl › film › Coś-1982-4713</a><button>▼</button>
                <h2><a href="#">Coś (1982) - Filmweb</a></h2>
                <p>Coś (1982) The Thing - W odciętej od świata bazie badawczej na Antarktydzie coś morduje naukowców.</p>
            </div>
            <div class="result">
                <a class="link" href="#">pl.wiktionary.org › wiki › coś</a><button>▼</button>
                <h2><a href="#">coś – Wikisłownik, wolny słownik wielojęzyczny</a></h2>
                <p>wymowa: IPA: [ʦ̑ɔɕ], AS: [coś] ​ · ​. znaczenia: zaimek nieokreślony. (1.1) …zastępujący nazwę dowolnego przedmiotu lub faktu, której mówiący nie chce ...</p>
            </div>
            <div class="result">
                <a class="link" href="#">www.pozycjonusz.pl › rodzaje-wynikow-wyszukiwania...</a><button>▼</button>
                <h2><a href="#">Rodzaje wyników wyszukiwania Google - ponad 20 ...</a></h2>
                <p>7) Wewnętrzna wyszukiwarka. Rodzaje wyników wyszukiwania Google wzbogacono jakiś czas temu o funkcję wewnętrznej wyszukiwarki. To rozwiązanie, bez ...</p>
            </div>
            <div class="result">
                <a class="link" href="#">www.olx.pl › Wszystkie ogłoszenia › Zwierzęta</a><button>▼</button>
                <h2><a href="#">Koty, kocięta, kociaki sprzedam, oddam Ogłoszenia OLX.pl</a></h2>
                <p>>Koty z hodowli i ze schronisk, na sprzedaż i za darmo.</p>
            </div>
            <div class="result">
                <a class="link" href="#">www.filmweb.pl › film › Coś-1982-4713</a><button>▼</button>
                <h2><a href="#">Coś (1982) - Filmweb</a></h2>
                <p>Coś (1982) The Thing - W odciętej od świata bazie badawczej na Antarktydzie coś morduje naukowców.</p>
            </div>
            <div class="result">
                <a class="link" href="#">pl.wiktionary.org › wiki › coś</a><button>▼</button>
                <h2><a href="#">coś – Wikisłownik, wolny słownik wielojęzyczny</a></h2>
                <p>wymowa: IPA: [ʦ̑ɔɕ], AS: [coś] ​ · ​. znaczenia: zaimek nieokreślony. (1.1) …zastępujący nazwę dowolnego przedmiotu lub faktu, której mówiący nie chce ...</p>
            </div>
            <div class="result">
                <a class="link" href="#">www.pozycjonusz.pl › rodzaje-wynikow-wyszukiwania...</a><button>▼</button>
                <h2><a href="#">Rodzaje wyników wyszukiwania Google - ponad 20 ...</a></h2>
                <p>7) Wewnętrzna wyszukiwarka. Rodzaje wyników wyszukiwania Google wzbogacono jakiś czas temu o funkcję wewnętrznej wyszukiwarki. To rozwiązanie, bez ...</p>
            </div>
            <div class="result">
                <a class="link" href="#">www.olx.pl › Wszystkie ogłoszenia › Zwierzęta</a><button>▼</button>
                <h2><a href="#">Koty, kocięta, kociaki sprzedam, oddam Ogłoszenia OLX.pl</a></h2>
                <p>>Koty z hodowli i ze schronisk, na sprzedaż i za darmo.</p>
            </div>
            <br>
            <div class="related_results">
                <h2>Wyszukiwania podobne do: coś wynik google</h2>
                <table>
                    <tr>
                        <td>Wyniki wyszukiwania</td>
                        <td>Wyniki wyszukiwania</td>
                    </tr>
                    <tr>
                        <td>Wyniki wyszukiwania</td>
                        <td>Wyniki wyszukiwania</td>
                    </tr>
                    <tr>
                        <td>Wyniki wyszukiwania</td>
                        <td>Wyniki wyszukiwania</td>
                    </tr>
                    <tr>
                        <td>Wyniki wyszukiwania</td>
                        <td>Wyniki wyszukiwania</td>
                    </tr>
                </table>
            </div>
            <br><br>
            <table class="pages">
                <tr>
                    <td><span class="blue">G</span></td>
                    <td><span class="red">o</span></td>
                    <td><span class="yellow">o</span></td>
                    <td><span class="yellow">o</span></td>
                    <td><span class="yellow">o</span></td>
                    <td><span class="yellow">o</span></td>
                    <td><span class="yellow">o</span></td>
                    <td><span class="yellow">o</span></td>
                    <td><span class="yellow">o</span></td>
                    <td><span class="yellow">o</span></td>
                    <td><span class="yellow">o</span></td>
                    <td><span class="blue">g</span></td>
                    <td><span class="green">l</span></td>
                    <td><span class="red">e</span></td>
                    <td rowspan="2" style="width: 10px;"></td>
                    <td><span class="blue arrow">></span></td>
                </tr>
                <tr>
                    <td class="page_nr"></td>
                    <td class="page_nr" style="color: black; cursor: text;">1</td>
                    <td class="page_nr">2</td>
                    <td class="page_nr">3</td>
                    <td class="page_nr">4</td>
                    <td class="page_nr">5</td>
                    <td class="page_nr">6</td>
                    <td class="page_nr">7</td>
                    <td class="page_nr">8</td>
                    <td class="page_nr">9</td>
                    <td class="page_nr">10</td>
                    <td colspan="3"></td>
                    <td class="page_nr">Następna</td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <div class="localization">
                <p>
                    <a class="country">Polska</a>
                    <a class="loc"><strong>Kraków</strong>  -  Z Twojego adresu internetowego </a>
                    <a class="loc_more">- Użyj dokładnej lokalizacji</a><a class="loc_more">  -  Dowiedz się więcej</a>
                </p>
            </div>
            <ul>
                <li><a href="#">Pomoc</a></li>
                <li><a href="#">Prześlij opinię</a></li>
                <li><a href="#">Prywatność</a></li>
                <li><a href="#">Warunki</a></li>
            </ul>
        </div>
        </div>
</body>
 	<script>	
  var app = new Vue({	
    el: '#app',	
    data: {	
      in_focus: -1,	
      focused: true,
      selected_city: '',	
      googleSearch: '',	
      googleSearch_temp: '',	
      cities_update: true,	
      change_class: 0,	
      cities: window.cities,		
    },		
    watch: {	
      in_focus: function(){	
        this.cities_update = false;	
        this.googleSearch = this.filteredCities[this.in_focus].name;	
      },	
      googleSearch: function(){	
        if(this.googleSearch.length == 0){	
          this.filteredCities = '';	
        }	
        else{	
          this.findResultsDebounced();	
          this.cities_update=true;	
          if(this.in_focus == -1){	
            this.googleSearch_temp = this.googleSearch; 	
            this.findResultsDebounced();     	
          }	
        }	
      },	
    },	
    methods: {	
    createFilteredCities(bool){	
        if(bool){	
          let result = this.cities.filter(city => city.name.includes(this.googleSearch));	
          if(result.length > 10){	
             this.filteredCities = result.slice(1, 11);	
          }	
          else{	
            this.filteredCities = result;	
          }	
        this.in_focus = -1;	
           	
      }	
    },	
    change_page() {	
        if (this.change_class == 0){	
          this.change_class = 1;	
        }	
        else{	
          this.googleSearch = '';	
          this.change_class = 0;	
        }	
    },	
    update_input(name){	
        this.googleSearch = name;	
        this.change_page(); 
    },	
        	
    choose(i){	
        this.googleSearch = this.filteredCities[i].name;	
    },	
    enterKey() {	
      if(this.in_focus != -1){ 	
        this.googleSearch = this.filteredCities[this.in_focus].name	
        this.in_focus = -1;	
        this.change_page();	
        this.focused = false;	
      }	
      else{	
        this.change_page();	
      }	
    },	
    upKey() {	
      if(this.in_focus > -1){	
        this.in_focus -= 1;	
      }	
      else if(this.in_focus == 0){	
        this.in_focus = this.filteredCities.length - 1;	
      }	
    },	
    downKey() {	
      if(this.in_focus < this.filteredCities.length - 1){	
        this.in_focus += 1;	
      }	
      else if(this.in_focus == this.filteredCities.length - 1){	
        this.in_focus = -1;	
      }	
    },	
  bolderize(input_city){	
    let regex = new RegExp(this.googleSearch_temp, "gi");	
    let bold = "<b>" + 	
      input_city.name.replace(regex, match =>	
          {return "<span class='thin'>"+ match +"</span>";}) 	
              + "</b>";	
      return bold;	
  },

  findResultsDebounced : Cowboy.debounce(100, function findResultsDebounced() {
    console.log('Fetch: ', this.googleSearch)
    fetch(`http://localhost/search?name=${this.googleSearch}`)
        .then(resp => {resp.json();
        console.log(resp.headers.get('Content-Type'));})
        .then(data => {
            console.log('Data: ', data);
            this.filteredCities = data;
        });
})
} 
})
</script>
</html>
