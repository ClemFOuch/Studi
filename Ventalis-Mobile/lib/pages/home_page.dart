import 'package:flutter/material.dart';
import 'command_page.dart';
import 'conseil_page.dart';

class HomePage extends StatelessWidget {
  const HomePage({
    super.key,
  });

  @override
  Widget build(BuildContext context) {
    return Center(
        child: Column(
      mainAxisAlignment: MainAxisAlignment.start,
      children: <Widget>[
        Padding(padding: EdgeInsets.only(top: 20, bottom: 30)),
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
        const Text(
          "Membre Ventalis depuis 2023",
          style: TextStyle(fontSize: 16, fontFamily: 'Poppins'),
          textAlign: TextAlign.center,
        ),
        Padding(padding: EdgeInsets.only(top: 10, bottom: 10)),
        Container(
          height: 150,
          width: 400,
          color: Color(0xffffffff),
          padding: EdgeInsets.all(10),
          child: Column(
            children: [
              Text(
                "Votre conseillé Ventalis",
                style: TextStyle(
                    fontSize: 24,
                    color: Color(0xff095b65),
                    fontFamily: 'Rancho'),
              ),
              Row(
                children: [
                  ClipOval(
                    child: SizedBox.fromSize(
                      size: Size.fromRadius(50), // Image radius
                      child: Image.asset("assets/images/conseil.jpg",
                          fit: BoxFit.cover),
                    ),
                  ),
                  Expanded(
                      child: Container(
                    padding: EdgeInsets.all(8),
                    child: Text("Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                          style: TextStyle(fontSize: 16, fontFamily: 'Poppins')
                    ),
                  )),
                ],
              )
            ],
          ),
        ),
        Padding(padding: EdgeInsets.only(top: 10, bottom: 10)),
        Container(
          height: 200,
          width: 400,
          color: Color(0xffCAAF94),
          padding: EdgeInsets.all(10),
          child: Column(
            children: [
              Text(
                "Vos commandes",
                style: TextStyle(
                    fontSize: 24,
                    color: Color(0xff095b65),
                    fontFamily: 'Rancho'),
              ),
              Padding(padding: EdgeInsets.only(top: 10, bottom: 10)),
              Text(
                "Commande du 14/12/12 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. ",
                style: TextStyle(
                    fontSize: 12,
                    color: Colors.black,
                    fontFamily: 'Poppins'),
                textAlign: TextAlign.center,
              ),
              Padding(padding: EdgeInsets.only(top: 5, bottom: 5)),
              Text(
                "Commande du 16/12/12 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. ",
                style: TextStyle(
                    fontSize: 12,
                    color: Colors.black,
                    fontFamily: 'Poppins'),
                textAlign: TextAlign.center,
              ),
              Padding(padding: EdgeInsets.only(top: 5, bottom: 5)),
              Text(
                "Commande du 18/12/12 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. ",
                style: TextStyle(
                    fontSize: 12,
                    color: Colors.black,
                    fontFamily: 'Poppins'),
                textAlign: TextAlign.center,
              ),
            ],
          ),
        ),
      ],
    ));
  }
}
