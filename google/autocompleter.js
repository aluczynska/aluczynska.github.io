Vue.component('v-autocompleter', {
  <div class="lista">
                    <input ref="first" v-model="googleSearch" type="text" class="glownainput" @focus="focused" v-on:keyup.down="downKey" v-on:keyup.up="upKey" v-on:keyup.enter="enterKey"/>
                    <div class="bottom_border"></div>	
                <div class="list">	
                  <ul v-for="(city, index) in filteredCities" v-on:click="update_input(city.name)">	
                    <li :class="{greyspace: index == in_focus}">		
                       <a v-on:click="choose(index)" v-html="bolderize(city)">{{ city }}</a>	
                    </li>	
                  </ul>	
                </div>	
              </div>	})
