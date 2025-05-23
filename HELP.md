# Read Me First
The following was discovered as part of building this project:

* The original package name 'com.proyecto-de-aula.EducationalHarmonie_pa5' is invalid and this project uses 'com.proyecto_de_aula.EducationalHarmonie_pa5' instead.

# Getting Started

### Reference Documentation
For further reference, please consider the following sections:

* [Official Apache Maven documentation](https://maven.apache.org/guides/index.html)
* [Spring Boot Maven Plugin Reference Guide](https://docs.spring.io/spring-boot/3.4.0-SNAPSHOT/maven-plugin)
* [Create an OCI image](https://docs.spring.io/spring-boot/3.4.0-SNAPSHOT/maven-plugin/build-image.html)
* [Spring Data JPA](https://docs.spring.io/spring-boot/docs/3.4.0-SNAPSHOT/reference/htmlsingle/index.html#data.sql.jpa-and-spring-data)
* [Spring Boot DevTools](https://docs.spring.io/spring-boot/docs/3.4.0-SNAPSHOT/reference/htmlsingle/index.html#using.devtools)
* [Spring Web](https://docs.spring.io/spring-boot/docs/3.4.0-SNAPSHOT/reference/htmlsingle/index.html#web)
* [Spring Session](https://docs.spring.io/spring-session/reference/)
* [Rest Repositories](https://docs.spring.io/spring-boot/docs/3.4.0-SNAPSHOT/reference/htmlsingle/index.html#howto.data-access.exposing-spring-data-repositories-as-rest)
* [Spring Web Services](https://docs.spring.io/spring-boot/docs/3.4.0-SNAPSHOT/reference/htmlsingle/index.html#io.webservices)
* [Thymeleaf](https://docs.spring.io/spring-boot/docs/3.4.0-SNAPSHOT/reference/htmlsingle/index.html#web.servlet.spring-mvc.template-engines)
* [Spring Security](https://docs.spring.io/spring-boot/docs/3.4.0-SNAPSHOT/reference/htmlsingle/index.html#web.security)
* [Spring Data MongoDB](https://docs.spring.io/spring-boot/docs/3.4.0-SNAPSHOT/reference/htmlsingle/index.html#data.nosql.mongodb)
* [Java Mail Sender](https://docs.spring.io/spring-boot/docs/3.4.0-SNAPSHOT/reference/htmlsingle/index.html#io.email)
* [Spring Batch](https://docs.spring.io/spring-boot/docs/3.4.0-SNAPSHOT/reference/htmlsingle/index.html#howto.batch)

### Guides
The following guides illustrate how to use some features concretely:

* [Accessing Data with JPA](https://spring.io/guides/gs/accessing-data-jpa/)
* [Building a RESTful Web Service](https://spring.io/guides/gs/rest-service/)
* [Serving Web Content with Spring MVC](https://spring.io/guides/gs/serving-web-content/)
* [Building REST services with Spring](https://spring.io/guides/tutorials/rest/)
* [Accessing JPA Data with REST](https://spring.io/guides/gs/accessing-data-rest/)
* [Accessing Neo4j Data with REST](https://spring.io/guides/gs/accessing-neo4j-data-rest/)
* [Accessing MongoDB Data with REST](https://spring.io/guides/gs/accessing-mongodb-data-rest/)
* [Producing a SOAP web service](https://spring.io/guides/gs/producing-web-service/)
* [Handling Form Submission](https://spring.io/guides/gs/handling-form-submission/)
* [Securing a Web Application](https://spring.io/guides/gs/securing-web/)
* [Spring Boot and OAuth2](https://spring.io/guides/tutorials/spring-boot-oauth2/)
* [Authenticating a User with LDAP](https://spring.io/guides/gs/authenticating-ldap/)
* [Accessing Data with MongoDB](https://spring.io/guides/gs/accessing-data-mongodb/)
* [Creating a Batch Service](https://spring.io/guides/gs/batch-processing/)

### Maven Parent overrides

Due to Maven's design, elements are inherited from the parent POM to the project POM.
While most of the inheritance is fine, it also inherits unwanted elements like `<license>` and `<developers>` from the parent.
To prevent this, the project POM contains empty overrides for these elements.
If you manually switch to a different parent and actually want the inheritance, you need to remove those overrides.

