Vue.component('v-autocompleter', {

  props: ['options'],

  data: function () {
    return {
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
          this.createFilteredCities(this.cities_update);	
          this.cities_update=true;	
          if(this.in_focus == -1){	
            this.googleSearch_temp = this.googleSearch; 	
            this.createFilteredCities(true);     	
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
}


},

    templete:'<input ref="first" v-model="googleSearch" type="text" class="glownainput" @focus="focused" v-on:keyup.down="downKey" v-on:keyup.up="upKey" v-on:keyup.enter="enterKey"/>\
                    <div class="bottom_border"></div>\	
                <div class="list">\	
                  <ul v-for="(city, index) in filteredCities" v-on:click="update_input(city.name)">\	
                    <li :class="{greyspace: index == in_focus}">\		
                       <a v-on:click="choose(index)" v-html="bolderize(city)">{{ city }}</a>\
                      </li>\
                    </ul>\
                  </div>'
  })
