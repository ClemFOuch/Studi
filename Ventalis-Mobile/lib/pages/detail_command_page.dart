import 'package:flutter/material.dart';

class DetailCommand extends StatelessWidget {
  const DetailCommand({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        leading: Image.asset("assets/images/sheet.png", fit: BoxFit.contain),
        backgroundColor: Color(0xffffffff),
        title: Text("Ventalis"),
        titleTextStyle: TextStyle(
          fontFamily: 'Poppins',
          fontSize: 20,
          color: Color(0xff095b65),
        ),
      ),
      backgroundColor: Color(0xff095b65),
      body: Center(
        child: Column(
          children: [
            Padding(padding: EdgeInsets.only(top: 5, bottom: 5)),
            ClipOval(
              child: SizedBox.fromSize(
                size: Size.fromRadius(60), // Image radius
                child: Image.asset("assets/images/profil.jpg", fit: BoxFit.cover),
              ),
            ),
            const Text(
              "John Doe",
              style: TextStyle(
                  fontSize: 36, color: Color(0xffffffff), fontFamily: 'Rancho'),
            ),
            Container(
              width: 400,
              color: Color(0xffCAAF94),
              padding: EdgeInsets.all(10),
              child: Column(
                children: [
                  Text("Ma commande",style: TextStyle(
                      fontSize: 24,
                      color: Color(0xff095b65),
                      fontFamily: 'Rancho'),),
                  Padding(padding: EdgeInsets.all(10)),
                  Text("Commande du 12/12/12 : Lorem ipsum dolor sit amet, consectetur adipiscing elit.",style: TextStyle(
                      fontSize: 12,
                      color: Colors.black,
                      fontFamily: 'Poppins'),
                    textAlign: TextAlign.center),
                  Column(
                    mainAxisAlignment: MainAxisAlignment.start,
                    children: [
                      Row(
                        children: [
                          Padding(padding: EdgeInsets.all(10)),
                          ClipOval(
                            child: SizedBox.fromSize(
                              size: Size.fromRadius(50), // Image radius
                              child: Image.asset("assets/images/planet.png",
                                  fit: BoxFit.contain),
                            ),
                          ),
                          Expanded(
                            child: Column(
                              children: [
                                Padding(padding: EdgeInsets.all(10)),
                                Container(
                                  child: Text("Produit 1",style: TextStyle(
                                      fontSize: 12,
                                      color: Colors.black,
                                      fontFamily: 'Poppins'),
                                    textAlign: TextAlign.center,),
                                ),
                                Text("125€",style: TextStyle(
                                    fontSize: 12,
                                    color: Colors.black,
                                    fontFamily: 'Poppins'),
                                  textAlign: TextAlign.center,)
                              ],
                            ),
                          ),
                        ],
                      ),
                    ],
                  ),
                  Text("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in varius ligula, at ultrices urna. Morbi neque enim, bibendum et nisl nec, malesuada venenatis dolor. Duis sem nisi, venenatis sed gravida id, vulputate ut sem. Curabitur id felis at massa fermentum vulputate ac at purus. Vivamus blandit elit leo.",style: TextStyle(
                      fontSize: 12,
                      color: Colors.black,
                      fontFamily: 'Poppins'),
                      textAlign: TextAlign.center),
                  Padding(padding: EdgeInsets.all(10)),
                  Column(
                    mainAxisAlignment: MainAxisAlignment.start,
                    children: [
                      Row(
                        children: [
                          Padding(padding: EdgeInsets.all(10)),
                          ClipOval(
                            child: SizedBox.fromSize(
                              size: Size.fromRadius(50), // Image radius
                              child: Image.asset("assets/images/planet.png",
                                  fit: BoxFit.contain),
                            ),
                          ),
                          Expanded(
                            child: Column(
                              children: [
                                Padding(padding: EdgeInsets.all(10)),
                                Container(
                                  child: Text("Produit 2",style: TextStyle(
                                      fontSize: 12,
                                      color: Colors.black,
                                      fontFamily: 'Poppins'),
                                    textAlign: TextAlign.center,),
                                ),
                                Text("500€",style: TextStyle(
                                    fontSize: 12,
                                    color: Colors.black,
                                    fontFamily: 'Poppins'),
                                  textAlign: TextAlign.center,)
                              ],
                            ),
                          ),
                        ],
                      ),
                    ],
                  ),
                  Text("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in varius ligula, at ultrices urna. Curabitur id felis at massa fermentum vulputate ac at purus. Vivamus blandit elit leo.",style: TextStyle(
                      fontSize: 12,
                      color: Colors.black,
                      fontFamily: 'Poppins'),
                      textAlign: TextAlign.center),
                ],
              ),

            ),
          ],
        ),
      ),
    );
  }
}
