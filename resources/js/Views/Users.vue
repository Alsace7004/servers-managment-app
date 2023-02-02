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
</template>

<script setup>
    import ContentHeader from "../components/ContentHeader.vue"

</script>

<style scoped>

</style>
