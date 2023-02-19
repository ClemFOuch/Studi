import 'package:flutter/material.dart';

class ConseilPage extends StatefulWidget {
  const ConseilPage({Key? key}) : super(key: key);

  @override
  State<ConseilPage> createState() => _ConseilPageState();
}

class _ConseilPageState extends State<ConseilPage> {
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
              child:
                  Image.asset("assets/images/conseil.jpg", fit: BoxFit.cover),
            ),
          ),
          const Text(
            "Edge Insets",
            style: TextStyle(
                fontSize: 36, color: Color(0xffffffff), fontFamily: 'Rancho'),
          ),
          const Text(
            "Conseillé Ventalis depuis 2000",
            style: TextStyle(fontSize: 16, fontFamily: 'Poppins'),
            textAlign: TextAlign.center,
          ),
          Padding(padding: EdgeInsets.only(top: 10, bottom: 10)),
          ElevatedButton.icon(
          style: ButtonStyle(
          backgroundColor: MaterialStatePropertyAll(Colors.lightGreen),
          ),
          onPressed: () => print("click"),
          icon: Icon(Icons.phone),
          label: Text("Contactez votre Conseillé"),),
        ],
      ),
    );
  }
}
