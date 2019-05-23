    <template>
        <v-app
                id="inspire"
                dark
        >
            <v-navigation-drawer
                    v-model="drawer"
                    fixed
                    clipped
                    app
            >
                <v-list dense>
                    <v-list-tile v-for="item in items" :key="item.text" @click="goToPage(item.route)">
                        <v-list-tile-action>
                            <v-icon>{{ item.icon }}</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title>
                                {{ item.text }}
                            </v-list-tile-title>
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list>
            </v-navigation-drawer>
            <v-toolbar
                    color="primary"
                    dense
                    fixed
                    clipped-left
                    app
            >
                <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
                <v-icon class="mx-3">fa fa-graduation-cap</v-icon>
                <v-toolbar-title class="mr-5 align-center">
                    <span class="title">Fostudy</span>
                </v-toolbar-title>
            </v-toolbar>
            <v-content>
                <v-container fill-height fluid grid-list-xl>
                    <v-layout>
                        <v-flex shrink xs12>
                           <router-view></router-view>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-content>
        </v-app>
    </template>

    <script>
        export default {
            data: () => ({
                drawer: null,
                items: [
                    { icon: 'dashboard', text: 'Dashboard', route: '/dashboard'},
                    { icon: 'school', text: 'Instituicoes', route: '/instituicoes'},
                    { icon: 'book', text: 'Disciplinas', route: '/disciplinas'},
                    { icon: 'border_color', text: 'Provas', route: '/provas'},
                    { icon: 'featured_play_list', text: 'Trabalhos', route: '/trabalhos'},
                ]
            }),
            props: {
                source: String
            },
            methods: {
                goToPage(route) {
                    this.$router.push(route)
                }
            }
        }
    </script>