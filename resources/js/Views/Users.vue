<template>
            <ContentHeader message="Users Page !!!"/>
            
                        <div class="data_box">
                            <div class="data_box_header">
                                <div class="per_page">
                                    <select name="" id="" class="select_option_form">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                    </select>
                                </div>
                                <div class="search_bar">
                                    <input type="text" class="search_bar_form" name="" id="" placeholder="Rechercher...">
                                </div>
                            </div>
                            <div class="data_box_content">
                                <table>
                                    <thead>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01</td>
                                            <td>Kodjo</td>
                                            <td>EYRAM</td>
                                            <td>kodjo@eyram.com</td>
                                            <td>
                                                <button class="view_btn"><i class="fas fa-eye"></i></button>
                                                <button class="edit_btn"><i class="fas fa-edit"></i></button>
                                                <button class="delete_btn"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>02</td>
                                            <td>Komlan</td>
                                            <td>ETONAM</td>
                                            <td>Komlan@ETONAM.com</td>
                                            <td>
                                                <button class="view_btn"><i class="fas fa-eye"></i></button>
                                                <button class="edit_btn"><i class="fas fa-edit"></i></button>
                                                <button class="delete_btn"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>03</td>
                                            <td>Kokou</td>
                                            <td>ESSENAM</td>
                                            <td>Kokou@ESSENAM.com</td>
                                            <td>
                                                <button class="view_btn"><i class="fas fa-eye"></i></button>
                                                <button class="edit_btn"><i class="fas fa-edit"></i></button>
                                                <button class="delete_btn"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>04</td>
                                            <td>Yao</td>
                                            <td>ELOLO</td>
                                            <td>Yao@ELOLO.com</td>
                                            <td>
                                                <button class="view_btn"><i class="fas fa-eye"></i></button>
                                                <button class="edit_btn"><i class="fas fa-edit"></i></button>
                                                <button class="delete_btn"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>05</td>
                                            <td>Koffi</td>
                                            <td>VIGNON</td>
                                            <td>Koffi@VIGNON.com</td>
                                            <td>
                                                <button class="view_btn"><i class="fas fa-eye"></i></button>
                                                <button class="edit_btn"><i class="fas fa-edit"></i></button>
                                                <button class="delete_btn"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>06</td>
                                            <td>Komi</td>
                                            <td>GAGNON</td>
                                            <td>Komi@GAGNON.com</td>
                                            <td>
                                                <button class="view_btn"><i class="fas fa-eye"></i></button>
                                                <button class="edit_btn"><i class="fas fa-edit"></i></button>
                                                <button class="delete_btn"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>07</td>
                                            <td>Kossi</td>
                                            <td>EDJODJINAM</td>
                                            <td>Kossi@EDJODJINAM.com</td>
                                            <td>
                                                <button class="view_btn"><i class="fas fa-eye"></i></button>
                                                <button class="edit_btn"><i class="fas fa-edit"></i></button>
                                                <button class="delete_btn"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="data_box_footer">
                                <div>
                                    (1-5 sur 10)
                                </div>
                                <div>
                                    <button class="previous_btn">Previous</button>
                                    1 2 3 ... 59
                                    <button class="next_btn">Next</button>
                                </div>
                            </div>
                        </div>
                        <!-- Proper Modal Begin -->
                        <proper-modal v-show="isModalVisible">
                            <template v-slot:header>
                                <h4>The Modal title</h4>
                                <button type="button" @click="closeModal()" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </template>
                            <template v-slot:body>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    Nunc sed velit dignissim sodales ut eu sem integer vitae. Id aliquet lectus proin nibh nisl condimentum. 
                                    Fringilla urna porttitor rhoncus dolor purus. Nam aliquam sem et tortor. Nisl vel pretium lectus quam id. 
                                    Cras pulvinar mattis nunc sed. Quis ipsum suspendisse ultrices gravida dictum fusce ut placerat orci. 
                                    Tristique magna sit amet purus. Fermentum et sollicitudin ac orci phasellus egestas tellus. 
                                    Erat pellentesque adipiscing commodo elit at imperdiet dui accumsan. Felis eget nunc lobortis mattis aliquam faucibus. 
                                    Tincidunt eget nullam non nisi est sit amet facilisis. Mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. 
                                    Vitae proin sagittis nisl rhoncus mattis rhoncus urna neque. Eget nunc scelerisque viverra mauris in aliquam sem fringilla ut. 
                                    Nec nam aliquam sem et tortor consequat id. Commodo nulla facilisi nullam vehicula ipsum a. Elementum tempus egestas sed sed. 
                                    Faucibus purus in massa tempor nec feugiat nisl pretium fusce.</p>
                                <p>Arcu cursus vitae congue mauris rhoncus aenean. Tempor id eu nisl nunc mi. Pharetra diam sit amet nisl suscipit adipiscing bibendum. 
                                    Ut faucibus pulvinar elementum integer enim. Odio facilisis mauris sit amet massa vitae tortor condimentum lacinia. 
                                    Eu non diam phasellus vestibulum lorem sed risus. Porttitor rhoncus dolor purus non enim praesent. 
                                    Sit amet mauris commodo quis imperdiet. Lobortis feugiat vivamus at augue eget. Nibh tellus molestie nunc non blandit. 
                                    Tellus mauris a diam maecenas sed enim ut. Tortor aliquam nulla facilisi cras fermentum odio eu feugiat pretium. 
                                    Mattis aliquam faucibus purus in massa.</p>
                            </template>
                            <template v-slot:footer>
                                <div>
                                    <button class="mdl-btn-danger" @click="closeModal()">Cancel</button>
                                    <button class="mdl-btn-primary" @click="closeModal()">Save</button>
                                </div>
                            </template>
                        </proper-modal>
                        <!-- Proper Modal End -->
</template>

<script setup>
    import ContentHeader from "../components/ContentHeader.vue"
    import ProperModal from "../components/ProperModal.vue"
    /****************GDialog*****Begin*****************/
    let isModalVisible = ref(false)
    /****************GDialog*****End*******************/
</script>

<style scoped>

</style>
