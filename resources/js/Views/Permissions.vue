<template>
    
        <ContentHeader message="Permissions Page !!!"/>
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
                                <v-table :columns="columns">
                                    <tbody>
                                        <tr>
                                            <td>01</td>
                                            <td>Create-User</td>
                                            <td>10-01-2023</td>
                                            <td>
                                                <button class="view_btn"><i class="fas fa-eye"></i></button>
                                                <button class="edit_btn"><i class="fas fa-edit"></i></button>
                                                <button class="delete_btn"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>02</td>
                                            <td>View-User</td>
                                            <td>10-02-2023</td>
                                            <td>
                                                <button class="view_btn"><i class="fas fa-eye"></i></button>
                                                <button class="edit_btn"><i class="fas fa-edit"></i></button>
                                                <button class="delete_btn"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>03</td>
                                            <td>Edit-user</td>
                                            <td>10-03-2023</td>
                                            <td>
                                                <button class="view_btn"><i class="fas fa-eye"></i></button>
                                                <button class="edit_btn"><i class="fas fa-edit"></i></button>
                                                <button class="delete_btn"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>03</td>
                                            <td>Delete-user</td>
                                            <td>10-03-2023</td>
                                            <td>
                                                <button class="view_btn"><i class="fas fa-eye"></i></button>
                                                <button class="edit_btn"><i class="fas fa-edit"></i></button>
                                                <button class="delete_btn"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </v-table>
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
    import vTable from "../components/vTable/vTable.vue"
    let columns = [
        {label:'~#',name:''},
        {label:'Permissions',name:''},
        {label:'Ajouté Le',name:''},
        {label:'Actions',name:''}, 
    ]
</script>

<style scoped>

</style>
