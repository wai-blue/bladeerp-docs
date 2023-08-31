# BladeERP

BladeERP is a PHP-based open-source ERP system built using the [ADIOS platform](https://github.com/wai-blue/adios).

This repository contains the specification of this system, divided into following parts:

  * **[Introduction](Introduction)** introduces the BladeERP system, its philosophy and architecture concepts.
  * **[Core](Core)** describes the core functionalities of the system.
  * **[Modules](Modules)** describes each module separately. A module consits of `Widgets` and widgets contain `Models`. In this part, the complete data structure of the system and the funcional features of the modules are described.
  * **[Web](Web)** describes the functionality of the public zone accessible by the customers of the company using the system.
  * Parts prefixed with the underscore (_) contain some helper files and scripts to help keep this documentation consistent.

Based on this specification, the main part of the source code will be auto-generated by the **[ADIOS prototype builder](https://github.com/wai-blue/ADIOS/tree/main/docs/Prototype)** utility.

## Standardized notation

The specification of the [Modules](Modules), which is the most comprehensive part of this specification, is **strongly standardized**. When browsing through the definition of models (or actions, a.k.a controllers), you will realize that the structure of the documents is very strict.

This significantly helps understanding the content and the expected features of the system.

We encourage you to [start browsing](Modules).

## Work in progress

This specification is still a work in progress. As for today, you will find non-english texts or maybe unfinished specifications. But we are constantly working to create the first release of this specification.
