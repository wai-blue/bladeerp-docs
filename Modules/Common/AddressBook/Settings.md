# Settings

* settings_com_address_book_default_country_id
  * title: Default Country Used in all addresses
  * description: Country which is used as default in all addresses
  * model: App/Widgets/Common/AddressBook/Models/Country

* settings_com_address_book_default_person_name_ordering
  * title: Default Person Name Ordering
  * description: What kind of ordering will be used in case of natural person names
  * default_value: "first_name, last_name"
  * enum_values: 
    * "first_name, last_name" => "First Name and Last Name"
    * "last_name, first_name" => "Last Name and First Name"
